<?php

namespace Lambda\LambdaBundle\Controller;

use Lambda\LambdaBundle\Entity\TextcomUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Textcomuser controller.
 *
 * @Route("usrtxtcom")
 */
class TextcomUserController extends Controller
{
    /**
     * Lists all textcomUser entities.
     *
     * @Route("/", name="textcommentaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $textcomUsers = $em->getRepository('LambdaBundle:TextcomUser')->findAll();

        return $this->render('textcom/index.html.twig', array(
            'textcoms' => $textcomUsers,
        ));
    }

    /**
     * Creates a new textcomUser entity.
     *
     * @Route("/new/{idcommente}", name="usertxtcommentaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $idcommente)
    {
        $user = $this->getUser();
        $textcomUser = new Textcomuser();
        
        $form = $this->createForm('Lambda\LambdaBundle\Form\TextcomType', $textcomUser, array('data_class'=>'Lambda\LambdaBundle\Entity\TextcomUser'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusercommente = $em->getRepository('LambdaBundle:User')->findOneById($idcommente);
            $textcomUser->setIdusercommente($idusercommente);
            $textcomUser->setIduser($user);
            $em->persist($textcomUser);
            $em->flush($textcomUser);

            return $this->redirectToRoute('textcommentaire_show', array('id' => $textcomUser->getIdcommentaire()));
        }

        return $this->render('textcom/new.html.twig', array(
            'textcom' => $textcomUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a textcomUser entity.
     *
     * @Route("/{id}", name="textcommentaire_show")
     * @Method("GET")
     */
    public function showAction(TextcomUser $textcomUser)
    {
        $deleteForm = $this->createDeleteForm($textcomUser);

        return $this->render('textcom/show.html.twig', array(
            'textcom' => $textcomUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing textcomUser entity.
     *
     * @Route("/{id}/edit", name="textcommentaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TextcomUser $textcomUser)
    {
        $deleteForm = $this->createDeleteForm($textcomUser);
        $editForm = $this->createForm('Lambda\LambdaBundle\Form\TextcomType', $textcomUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('textcommentaire_show', array('id' => $textcomUser->getIdcommentaire()));
        }

        return $this->render('textcom/edit.html.twig', array(
            'textcom' => $textcomUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a textcomUser entity.
     *
     * @Route("/{id}", name="textcommentaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TextcomUser $textcomUser)
    {
        $form = $this->createDeleteForm($textcomUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($textcomUser);
            $em->flush($textcomUser);
        }

        return $this->redirectToRoute('admin_usercommentaire_index');
    }

    /**
     * Creates a form to delete a textcomUser entity.
     *
     * @param TextcomUser $textcomUser The textcomUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TextcomUser $textcomUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('textcommentaire_delete', array('id' => $textcomUser->getIdcommentaire())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
