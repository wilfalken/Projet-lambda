<?php

namespace Lambda\LambdaBundle\Controller;

use Lambda\LambdaBundle\Entity\NoteExemplaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * NoteExemplaire controller.
 *
 * @Route("exnotecom")
 */
class NoteExController extends Controller
{
    /**
     * Lists all NoteExemplaire entities.
     *
     * @Route("/", name="notecommentaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $notecomExs = $em->getRepository('LambdaBundle:NoteExemplaire')->findAll();

        return $this->render('notecom/index.html.twig', array(
            'notecoms' => $notecomExs,
        ));
    }

    /**
     * Creates a new NoteExemplaire entity.
     *
     * @Route("/new/{idcommente}", name="exnotecommentaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $idcommente)
    {
        $user = $this->getUser();
        $notecomEx = new NoteExemplaire();
        
        $form = $this->createForm('Lambda\BaseBundle\Form\CommentairenoteType', $notecomEx, array('data_class'=>'Lambda\LambdaBundle\Entity\NoteExemplaire'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idexcommente = $em->getRepository('LambdaBundle:Exemplaire')->findOneByIdexemplaire($idcommente);
            $notecomEx->setIdexcommente($idexcommente);
            $notecomEx->setIduser($user);
            $em->persist($notecomEx);
            $em->flush($notecomEx);

            return $this->redirectToRoute('notecommentaire_show', array('id' => $notecomEx->getIdcommentaire()));
        }

        return $this->render('notecom/new.html.twig', array(
            'notecom' => $notecomEx,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a NoteExemplaire entity.
     *
     * @Route("/{id}", name="notecommentaire_show")
     * @Method("GET")
     */
    public function showAction(NoteExemplaire $notecomEx)
    {
        $deleteForm = $this->createDeleteForm($notecomEx);

        return $this->render('notecom/show.html.twig', array(
            'notecom' => $notecomEx,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing NoteExemplaire entity.
     *
     * @Route("/{id}/edit", name="notecommentaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, NoteExemplaire $notecomEx)
    {
        $deleteForm = $this->createDeleteForm($notecomEx);
        $editForm = $this->createForm('Lambda\BaseBundle\Form\CommentairenoteType', $notecomEx);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('notecommentaire_show', array('id' => $notecomEx->getIdcommentaire()));
        }

        return $this->render('notecom/edit.html.twig', array(
            'notecom' => $notecomEx,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a NoteExemplaire entity.
     *
     * @Route("/{id}", name="notecommentaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, NoteExemplaire $notecomEx)
    {
        $form = $this->createDeleteForm($notecomEx);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($notecomEx);
            $em->flush($notecomEx);
        }

        return $this->redirectToRoute('admin_excommentaire_index');
    }

    /**
     * Creates a form to delete a NoteExemplaire entity.
     *
     * @param NoteExemplaire $notecomEx The NoteExemplaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(NoteExemplaire $notecomEx)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('notecommentaire_delete', array('id' => $notecomEx->getIdcommentaire())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
