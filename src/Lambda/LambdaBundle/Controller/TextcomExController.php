<?php

namespace Lambda\LambdaBundle\Controller;

use Lambda\LambdaBundle\Entity\TextcomExemplaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Textcomexemplaire controller.
 *
 * @Route("/extxtcom")
 */
class TextcomExController extends Controller
{
    /**
     * Lists all textcomEx entities.
     *
     * @Route("/", name="textcommentaire_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $textcoms = $em->getRepository('LambdaBundle:TextcomExemplaire')->findAll();

        return $this->render('textcom/index.html.twig', array(
            'textcoms' => $textcoms,
        ));
    }

    /**
     * Creates a new textcomExemplaire entity.
     *
     * @Route("/new/{idcommente}", name="extextcommentaire_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $idcommente)
    {
        $user = $this->getUser();
        $textcomEx = new Textcomexemplaire();
        
        $form = $this->createForm('Lambda\LambdaBundle\Form\TextcomType', $textcomEx, array('data_class'=>'Lambda\LambdaBundle\Entity\TextcomExemplaire'));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idexcommente = $em->getRepository('LambdaBundle:Exemplaire')->findOneByIdexemplaire($idcommente);
            $textcomEx->setIdexcommente($idexcommente);
            $textcomEx->setIduser($user);
            $em->persist($textcomEx);
            $em->flush($textcomEx);

            return $this->redirectToRoute('textcommentaire_show', array('id' => $textcomEx->getIdcommentaire()));
        }

        return $this->render('textcom/new.html.twig', array(
            'textcom' => $textcomEx,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a textcomExemplaire entity.
     *
     * @Route("/{id}", name="textcommentaire_show")
     * @Method("GET")
     */
    public function showAction(TextcomExemplaire $textcomex)
    {
        $deleteForm = $this->createDeleteForm($textcomex);

        return $this->render('textcom/show.html.twig', array(
            'textcom' => $textcomex,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing textcomExemplaire entity.
     *
     * @Route("/{id}/edit", name="textcommentaire_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TextcomExemplaire $textcomex)
    {
        $deleteForm = $this->createDeleteForm($textcomex);
        $editForm = $this->createForm('Lambda\LambdaBundle\Form\TextcomType', $textcomex);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('textcommentaire_show', array('id' => $textcomex->getIdcommentaire()));
        }

        return $this->render('textcom/edit.html.twig', array(
            'textcom' => $textcomex,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a textcomExemplaire entity.
     *
     * @Route("/{id}", name="textcommentaire_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TextcomExemplaire $textcomex)
    {
        $form = $this->createDeleteForm($textcomex);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($textcomex);
            $em->flush($textcomex);
        }

        return $this->redirectToRoute('admin_textcommentaire_index');
    }

    /**
     * Creates a form to delete a textcomExemplaire entity.
     *
     * @param TextcomExemplaire $textcomex The textcomExemplaire entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TextcomExemplaire $textcomex)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('textcommentaire_delete', array('id' => $textcomex->getIdcommentaire())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
