<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\BaseBundle\Controller;

use Lambda\LambdaBundle\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;
/**
 * Description of GroupeController
 * @Route("/base/groupe")
 * @author admin
 */
class GroupeController extends Controller{
    
     /**
     * Liste tous les groupes.
     *
     * @Route("/", name="base_groupe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupes = $em->getRepository('LambdaBundle:Groupe')->findAll();
        
        return $this->render('BaseBundle:groupe:index.html.twig', array(
            'groupes' => $groupes,
            
        ));
    }
    
    /**
     * Crée une nouvelle entité Groupe.
     *
     * @Route("/new", name="base_groupe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, UserInterface $user)
    {
        $officier = $this->getUser();
        $groupe = new Groupe();
        $form = $this->createForm('Lambda\LambdaBundle\Form\GroupeType', $groupe);
        $form->handleRequest($request);
        //$idUser = $user->getIduser();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            if ($user != null) { //s'il ya un user
            
            $groupe->addUser($user);
            $groupe->addOfficier($officier);
            $user->addGroupe($groupe);
        }
            $em->persist($groupe);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('base_groupe_index', array('id' => $groupe->getIdgroupe()));
        }

        return $this->render('BaseBundle:groupe:new.html.twig', array(
            'groupe' => $groupe,
            'form' => $form->createView(),
        ));
    }
    
     /**
     * Efface une entité groupe.
     *
     * @Route("/{id}", name="base_groupe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Groupe $groupe)
    {
       
        $form = $this->createDeleteForm($groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupe);
            $em->flush($groupe);
        }

        return $this->redirectToRoute('profil');    ///TODO routing !!!
    }  
    
     /**
     * Displays a form to edit an existing groupe entity.
     *
     * @Route("/{id}/edit", name="base_groupe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Groupe $groupe)
    {
        $deleteForm = $this->createDeleteForm($groupe);
        $editForm = $this->createForm('Lambda\LambdaBundle\Form\GroupeType', $groupe);
        $editForm->handleRequest($request);
        // $membres = $groupe->getUsers();  // groupe.users dans Twig ???? // TODO => test
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            return $this->redirectToRoute('base_groupe_edit', array('id' => $groupe->getIdgroupe()));
        }

        return $this->render('BaseBundle:groupe:edit.html.twig', array(
            'groupe' => $groupe,
           // 'membres' => $membres // groupe.users dans Twig ???? // TODO => test
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
    private function createDeleteForm(Groupe $groupe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('base_groupe_delete', array('id' => $groupe->getIdgroupe())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    
     /**
     * promouvoir membre en officier.
     *
     * @Route("/{id}/promouvoir", name="base_groupe_promouvoir")
     * @Method({"GET", "POST"})
     */
    public function promouvoirAction(Groupe $groupe, Userinterface $user)
    {
        $em = $this->getDoctrine()->getManager();
            $groupe->addOfficier($user);
            $em->persist($groupe);
            $em->flush($groupe);
        return $this->redirectToRoute('base_groupe_edit', array('id' => $groupe->getIdgroupe()));
    }
    
     /**
     * virer un membre.
     *
     * @Route("/{id}/virer", name="base_groupe_virer")
     * @Method({"GET", "POST"})
     */
    public function virerAction(Groupe $groupe, UserInterface $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em -> getRepository('LambdaBundle:Groupe');
            $groupe->removeUser($user);
            $user->removeGroupe($groupe);
            $em->persist($groupe, $user);
            $em->flush($groupe, $user);
        return $this->redirectToRoute('base_groupe_index', array('id' => $groupe->getIdgroupe()));
    }
    
     /**
     * permet de sortir d'un groupe.
     *
     * @Route("/{id}/sortir", name="base_groupe_sortir")
     * @Method({"GET", "POST"})
     */    
    public function sortirAction(Groupe $groupe, Userinterface $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em -> getRepository('LambdaBundle:Groupe');
            $groupe->removeUser($user);
            $user->removeGroupe($groupe);
            $em->persist($groupe, $user);
            $em->flush($groupe, $user);
        return $this->redirectToRoute('base_groupe_index', array('id' => $groupe->getIdgroupe()));
    }
}
