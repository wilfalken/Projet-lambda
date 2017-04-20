<?php

namespace Lambda\LambdaBundle\Controller;

use Lambda\LambdaBundle\Entity\NoteUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Noteuser controller.
 *
 * @Route("usrnotecom")
 */
class NoteUserController extends Controller
{
    /**
     * Lists all NoteUser entities.
     *
     * @Route("/", name="notecommentaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notecomUsers = $em->getRepository('LambdaBundle:NoteUser')->findAll();

        return $this->render('notecom/index.html.twig', array(
            'notecoms' => $notecomUsers,
        ));
    }

    /**
     * Creates a new NoteUser entity.
     *
     * @Route("/new/{idcommente}", name="usernotecommentaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $idcommente)
    {
        $user = $this->getUser();
        $notecomUser = new NoteUser();
        
        $form = $this->createForm('Lambda\BaseBundle\Form\CommentairenoteType', $notecomUser, array('data_class'=>'Lambda\LambdaBundle\Entity\NoteUser'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idusercommente = $em->getRepository('LambdaBundle:User')->findOneById($idcommente);
            $notecomUser->setIdusercommente($idusercommente);
            $notecomUser->setIduser($user);
            $em->persist($notecomUser);
            $em->flush($notecomUser);

            return $this->redirectToRoute('notecommentaire_show', array('id' => $notecomUser->getIdcommentaire()));
        }

        return $this->render('notecom/new.html.twig', array(
            'notecom' => $notecomUser,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NoteUser entity.
     *
     * @Route("/{id}", name="notecommentaire_show")
     * @Method("GET")
     */
    public function showAction(NoteUser $notecomUser)
    {
        $deleteForm = $this->createDeleteForm($notecomUser);

        return $this->render('notecom/show.html.twig', array(
            'notecom' => $notecomUser,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NoteUser entity.
     *
     * @Route("/{id}/edit", name="notecommentaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NoteUser $notecomUser)
    {
        $deleteForm = $this->createDeleteForm($notecomUser);
        $editForm = $this->createForm('Lambda\BaseBundle\Form\CommentairenoteType', $notecomUser);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notecommentaire_show', array('id' => $notecomUser->getIdcommentaire()));
        }

        return $this->render('notecom/edit.html.twig', array(
            'notecom' => $notecomUser,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NoteUser entity.
     *
     * @Route("/{id}", name="notecommentaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NoteUser $notecomUser)
    {
        $form = $this->createDeleteForm($notecomUser);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($notecomUser);
            $em->flush($notecomUser);
        }

        return $this->redirectToRoute('admin_usercommentaire_index');
    }

    /**
     * Creates a form to delete a NoteUser entity.
     *
     * @param NoteUser $notecomUser The NoteUser entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NoteUser $notecomUser)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notecommentaire_delete', array('id' => $notecomUser->getIdcommentaire())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
