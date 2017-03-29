<?php

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DefaultController extends Controller {

    public function indexAction(Request $request) {


        $defaultData = array('search' => '');
        $form = $this->createFormBuilder($defaultData)
                ->add('search', SearchType::class, array(
                    'attr' => array('placeholder' => 'Cherchez des objets !'),
                        )
                )
                ->add('envoi', SubmitType::class, array('label' => 'Go !'))
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
             
            $data = $form->getData();
            $requete = $request->request->get('search');
            $em = $this->getDoctrine()->getManager();
            $liste_items = $em->getRepository('LambdaBundle:Item')
                    ->findBynomitem($data['search'])
            ;
//            foreach ($liste_items as $unitem) {
//                $categorie = $unitem->getIdcategorie()->getNomcategorie();
//               // $unitem->addIdcategorie($categorie->first());
//            }

            return $this->render('LambdaBundle:Search:listeItems.html.twig', array('liste_items' => $liste_items)); //'categories' => $categorie));
        }



        return $this->render('LambdaBundle:Default:index.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function connexionAction() {
        return $this->render('LambdaBundle:Default:connexion.html.twig');
    }

    public function inscriptionAction() {
        return $this->render('LambdaBundle:Default:inscription.html.twig');
    }

    public function adegagerAction() { {

            $form->bind($request);

            //On vérifie que les valeurs entrées sont correctes

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                //On récupère les données entrées dans le formulaire par l'utilisateur

                $data = $this->getRequest()->request->get('lambda_lambdabundle_search');

                //On va récupérer la méthode dans le repository afin de trouver toutes les annonces filtrées par les paramètres du formulaire

                $liste_items = $em->getRepository('LambdaBundle:Item')->findItemByNomitem($data);

                //Puis on redirige vers la page de visualisation de cette liste d'annonces

                return $this->render('LambdaBundle:Default:listeItems.html.twig', array('liste_items' => $liste_items));
            }
        }
    }
    
    public function searchAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();
        $liste_items = $em->getRepository('LambdaBundle:Item')
            ->createQueryBuilder('i')
                        ->where('i.nomItem = :requete')
                        ->setParameter('requete', $requete)
                          ;
    
        return $this->render('LambdaBundle:Search:listeItems.html.twig', array('liste_items' => $liste_items, 'requete' => $requete));
    }

}
