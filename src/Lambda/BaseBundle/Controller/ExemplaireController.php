<?php

namespace Lambda\BaseBundle\Controller;

use Lambda\LambdaBundle\Entity\Exemplaire;
use Lambda\LambdaBundle\Entity\Item;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Lambda\LambdaBundle\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ExemplaireController
 * @Route("/exemplaire")
 * @author admin
 */
class ExemplaireController extends Controller {

    
     /**
     * Lists all exemplaire entities.
     *
     * @Route("/", name="base_exemplaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $exemplaires = $em->getRepository('LambdaBundle:Exemplaire')->findAll();
        return $this->render('BaseBundle:exemplaire:index.html.twig', array(
            'exemplaires' => $exemplaires,
            
        ));
    }
    
     /**
     * Lists all exemplaire entities.
     *
     * @Route("/{iduser}", name="base_exemplaires_user")
     * @Method("GET")
     */
    public function indexuserAction(User $iduser)
    {
        
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('LambdaBundle:User')->findById($iduser);
        $exemplaires = $em->getRepository('LambdaBundle:Exemplaire')->findByUser($user);
        if ($this->getUser()==$user){
            return $this->render('BaseBundle:exemplaire:index.html.twig', array(
            'exemplaires' => $exemplaires,
        ));
        }
        return $this->render('BaseBundle:exemplaire:index.html.twig', array(
            'exemplaires' => $exemplaires,
            
        ));
    }
    

    
    
    
    /**
     * Crée une nouvelle entité Exemplaire.
     *
     * @Route("/{iditem}/new", name="base_exemplaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Item $item) { //, Item $item ???
        
        $user = $this->getUser();
        $exemplaire = new Exemplaire();
        $form = $this->createForm('Lambda\BaseBundle\Form\ExemplaireType', $exemplaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($user != null) { //s'il ya un user
                $file=$exemplaire->getPhotoexemplaire(); //cherche la photo
                if (isset($file)) {
                    $fileName = md5(uniqid()).'.'.$file->guessExtension(); //génération nom de fichier
                    $file->move($this->getParameter('photo_exemplaire_directory'),$fileName); //trouve où mettre le fichier (config.yml)
                    $exemplaire->setPhotoexemplaire($fileName); //force le stockage du nom de fichier au lieu du contenu
                }
                $exemplaire->setUser($user);
                $exemplaire->setItem($em->getRepository('LambdaBundle:Item')->findOneByIditem($item));
                $user->addExemplaire($exemplaire);
                $item->addExemplaire($exemplaire);
                $em->persist($exemplaire);
                $em->persist($user);
                $em->persist($item);
                $em->flush();
            }
         return $this->redirectToRoute('base_exemplaires_user', array('iduser' => $user->getId()));
        }

        return $this->render('BaseBundle:exemplaire:new.html.twig', array(
            'exemplaire' => $exemplaire,
            'form' => $form->createView(),
        ));
    }
    
     /**
     * Displays a form to edit an existing exemplaire entity.
     *
     * @Route("/{id}/edit", name="base_exemplaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Exemplaire $exemplaire)
    {
        $user = $this->getUser();
        $deleteForm = $this->createDeleteForm($exemplaire);
        $editForm = $this->createForm('Lambda\BaseBundle\Form\ExemplaireType', $exemplaire);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file=$exemplaire->getPhotoexemplaire(); //cherche la photo
                if (isset($file)) {
                    $fileName = md5(uniqid()).'.'.$file->guessExtension(); //génération nom de fichier
                    $file->move($this->getParameter('photo_exemplaire_directory'),$fileName); //trouve où mettre le fichier (config.yml)
                    $exemplaire->setPhotoexemplaire($fileName); //force le stockage du nom de fichier au lieu du contenu
                }
                $exemplaire->setUser($user);
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('base_exemplaires_user', array('iduser' => $user->getId()));
        }
      
        return $this->render('BaseBundle:exemplaire:edit.html.twig', array(
            'exemplaire' => $exemplaire,
           'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
        /**
     * Finds and displays a exemplaire entity.
     *
     * @Route("/{id}/show", name="base_exemplaire_show")
     * @Method("GET")
     */
    public function showAction(Exemplaire $exemplaire)
    {
        $deleteForm = $this->createDeleteForm($exemplaire);

        return $this->render('BaseBundle:exemplaire:show.html.twig', array(
            'exemplaire' => $exemplaire,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
        /**
     * Deletes a exemplaire entity.
     *
     * @Route("/{id}", name="base_exemplaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Exemplaire $exemplaire)
    {
        $user = $this->getUser();
        $form = $this->createDeleteForm($exemplaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($exemplaire);
           
            $em->flush($exemplaire);
        }

        return $this->redirectToRoute('base_exemplaires_user', array('iduser' => $user->getId()));
    }
    
        /**
     * Creates a form to delete a exemplaire entity.
     *
     * @param Exemplaire $exemplaire The exemplaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Exemplaire $exemplaire)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('base_exemplaire_delete', array('id' => $exemplaire->getIdexemplaire())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
     /**
     * Efface une entité exemplaire sans formulaire.
     *
     * @Route("/{id}/sdelete", name="base_exemplaire_simpledelete")
     * @Method("GET")
     */
    public function simpledeleteAction(Exemplaire $exemplaire)
    {
       
        
            $em = $this->getDoctrine()->getManager();
            $em->remove($exemplaire);
            $em->flush($exemplaire);
        

        return $this->redirectToRoute('base_exemplaires_user', array('iduser' => $this->getUser()->getId()));    ///TODO routing !!!
    }  

}
