<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\BaseBundle\Controller;

use Lambda\LambdaBundle\Entity\Exemplaire;
use Lambda\LambdaBundle\Entity\Emprunt;
use DateInterval;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of EmpruntController
 * @route("/emprunt")
 * @author admin
 */
class EmpruntController extends Controller{
    
        public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $emprunts = $em->getRepository('LambdaBundle:Emprunt')->findAll();
        return $this->render('BaseBundle:emprunt:index.html.twig', array(
            'emprunts' => $emprunts,
            
        ));
    }
    
    /**
     * Crée une nouvelle entité Emprunt.
     *
     * @Route("/{idexemplaire}/{idemprunteur}/new", name="base_emprunt_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Exemplaire $exemplaire, $idemprunteur) { //, Item $item ???
        
        $user = $this->getUser();
        $emprunt = new Emprunt();
        $em = $this->getDoctrine()->getManager();
        $emprunteur = $em->getRepository('LambdaBundle:User')->findOneById($idemprunteur);
        $form = $this->createForm('Lambda\BaseBundle\Form\EmpruntType', $emprunt, array(
            'user' => $exemplaire->getUser(),
            'demandeur' => $emprunteur,
            'exemplaire' => $exemplaire,
                ));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($user != null) { //s'il ya un user
                $datearendre = date_add(new \DateTime, new DateInterval($form->get('duree')->getdata()));
                $emprunt->setIdexemplaire($exemplaire);
                $emprunt->setIdproprietaire($user);
                $emprunt->setIdemprunteur($emprunteur);
                $emprunt->setDateRendu($datearendre);
                //$emprunt->setItem($em->getRepository('LambdaBundle:Item')->findOneByIditem($item));
                $emprunteur->addEmprunt($emprunt);
                $user->addPret($emprunt);
                $em->persist($emprunt);
                $em->persist($emprunteur);
                $em->persist($user);
                $em->flush();
            }
                    return $this->redirectToRoute('base_emprunt_show', array('id' => $emprunt->getIdemprunt())); 
        }
        return $this->render('BaseBundle:emprunt:new.html.twig', array(
            'emprunt' => $emprunt,
            'form' => $form->createView(),
            ));
    }
    
    /**
     * Finds and displays a emprunt entity.
     *
     * @Route("/{id}", name="base_emprunt_show")
     * @Method("GET")
     */
    public function showAction(Emprunt $emprunt)
    {
        

        return $this->render('BaseBundle:emprunt:show.html.twig', array(
            'emprunt' => $emprunt,
            
        ));
    }
    
     /**
     * Finds and displays a emprunt entity.
     *
     * @Route("/{id}", name="base_emprunt_rendu")
     * @Method("GET")
     */
    public function renduAction(Emprunt $emprunt)
    {
        $emprunteur = $emprunt->getIdemprunteur();
        $proprietaire = $this->getUser();
        $emprunteur->removeEmprunt($emprunt);
        $proprietaire->removePret($emprunt);
        return $this->render('BaseBundle:emprunt:show.html.twig', array(
            'emprunt' => $emprunt,
            
            
        ));
    }
    

}
