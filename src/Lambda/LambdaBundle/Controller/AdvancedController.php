<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
/**
 * Description of AdvancedController
 *
 * @author admin
 */
class AdvancedController extends Controller{
    public function advancedAction(Request $request)
    {
        $defaultData = array('recherche' => '');
        
        $form = $this->createFormBuilder($defaultData)
                ->add('name', TextType::class, array(
                    'attr' => array('placeholder' => 'Entrez un nom d\'objet'
                        ),
                       'required' => false,
                    'label' => 'entrez un nom')
                )
                ->add('categorie', EntityType::class, array(
                    'class' => 'LambdaBundle:Categorie',
                    'choice_label' => 'nomcategorie',
                    'placeholder' => 'Choisissez une catégorie',
                    'required' => false
                ))
                ->add('user', TextType::class, array(
                    'attr' => array('placeholder' => 'Entrez un nom'),
                    'required' => false
                ))
                ->add('groups', TextType::class, array(
                    'attr' => array('placeholder' => 'Entrez un nom'),
                    'required' => false
                ))
                ->add('envoi', SubmitType::class, array('label' => 'Go !'))
                ->getForm();
        
        $form->handleRequest($request);
        $liste_resultats= "aucun résultat !!!";
        $categories = null;
        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();
            //$name = $data['name'];

            if (!($data['categorie']==null)){
            $categorie = $data['categorie'];
           // $categorie= $categories['0'];
                if (!($data['name']==null)){
                    $requete = $data['name'];
                    $em = $this->getDoctrine()->getManager();
                    $liste_resultats_inter = $em->getRepository('LambdaBundle:Item')
                            ->createQueryBuilder('i')
                            ->where('i.nomitem LIKE \'%'.$requete.'%\'')
                           //->setParameter('search', $requete)
                            ->getQuery()->getResult();
                        //->findBynomitem($data['name']);
                    if ($liste_resultats_inter===null){$liste_resultats="aucun resultat";}
                    foreach ($liste_resultats_inter as $unitem) {
                        if ($unitem->getCategorie()->getNomcategorie()==$categorie){
                            $liste_resultats =$unitem;
                        }
                        else{
                            $liste_resultats = "aucun résultat";//$liste_resultats_inter;
                        }
 //                       $unitem->addIdcategorie($categorie->first());
                    }
                }
                else {
                    $em = $this->getDoctrine()->getManager();
                    
                    $liste_resultats =  $em->getRepository('LambdaBundle:Item')
                        ->rechercheparidcategorie($categorie);
                    if ($liste_resultats==null){
                        $liste_resultats = "aucun resultat";
                    }
                    }

                    return $this->render('LambdaBundle:Search:listeItems.html.twig', array('liste_items' => $liste_resultats, 'categories' => $categorie));
            }
            else if (!($data['name']==null)){
                
                $em = $this->getDoctrine()->getManager();
                $requete = $data['name'];
                $liste_resultats =  $em->getRepository('LambdaBundle:Item')
                     //->findBynomitem($data['name']);
                        ->createQueryBuilder('i')
                            ->where('i.nomitem LIKE \'%'.$requete.'%\'')
                           //->setParameter('search', $requete)
                            ->getQuery()->getResult();
                    foreach ($liste_resultats as $unitem) {
                        $categories = $unitem->getCategorie()->getnomcategorie();
                       //$unitem->addIdcategorie($categories->first());
                    }
                return $this->render('LambdaBundle:Search:listeItems.html.twig', array('liste_items' => $liste_resultats, 'categories' => $categories));
            }
//            if ($name == null) {
//                $em2 = $this->getDoctrine()->getmanager();
//                $listecat = $em2->getRepository('LambdaBundle:Categorie')
//                        ->findBynomcategorie($categorie);
//                $listecat->first()->getIdcategorie();
//            }
            $user = $data['user'];
            $groupe = $data['groups'];
//            if ($name || $categorie) {
//                $em = $this->getDoctrine()->getManager();
//                $liste_resultats = $em->getRepository('LambdaBundle:Item')
//                        ->rechercheparnomcategorie($name, $categorie);
      
        
            if ($user){
                $em = $this->getDoctrine()->getManager();
                $liste_resultats = $em->getRepository('LambdaBundle:User')
                        ->findByusername($user);
                
                return $this->render('LambdaBundle:Search:listeusers.html.twig', array('liste_users' => $liste_resultats));
            }
            else if ($groupe){
                $em = $this->getDoctrine()->getManager();
                $liste_resultats = $em->getRepository('LambdaBundle:Groupe')
                        ->findBynomgroupe($groupe);
                return $this->render('LambdaBundle:Search:listegroupes.html.twig', array('liste_groupes' => $liste_resultats));
            }
            
        }
        
       return $this->render('LambdaBundle:Search:recherche.html.twig', array(
            'form' => $form->createView()
                ));
    }
    

}
