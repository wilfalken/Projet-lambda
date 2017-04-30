<?php

namespace Lambda\AdminBundle\Controller;

use Lambda\LambdaBundle\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\File;

/**
 * Evenement controller.
 *
 * @Route("admin/evenement")
 */
class EvenementController extends Controller
{
    /**
     * Lists all evenement entities.
     *
     * @Route("/", name="admin_evenement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('LambdaBundle:Evenement')->findAll();

        return $this->render('AdminBundle:evenement:index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Creates a new evenement entity.
     *
     * @Route("/new", name="admin_evenement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm('Lambda\AdminBundle\Form\EvenementType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $file=$evenement->getLienimage(); //cherche la photo
            $fileName = md5(uniqid()).'.'.$file->guessExtension(); //génération nom de fichier
            $file->move($this->getParameter('photo_evenement_directory'),$fileName); //trouve où mettre le fichier (config.yml)
            $evenement->setLienimage($fileName); //force le stockage du nom de fichier au lieu du contenu
            $em->persist($evenement);
            $em->flush($evenement);

            return $this->redirectToRoute('admin_evenement_show', array('id' => $evenement->getIdevenement()));
        }

        return $this->render('AdminBundle:evenement:new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evenement entity.
     *
     * @Route("/{id}", name="admin_evenement_show")
     * @Method("GET")
     */
    public function showAction(Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('AdminBundle:evenement:show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Route("/{id}/edit", name="admin_evenement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $evenement->setLienimage(new File($this->getParameter('photo_evenement_directory').'/'.$evenement->getLienimage()));
        $editForm = $this->createForm('Lambda\AdminBundle\Form\EvenementType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $file=$evenement->getLienimage(); //cherche la photo
            $fileName = md5(uniqid()).'.'.$file->guessExtension(); //génération nom de fichier
            $file->move($this->getParameter('photo_evenement_directory'),$fileName); //trouve où mettre le fichier (config.yml)
            $evenement->setLienimage($fileName); //force le stockage du nom de fichier au lieu du contenu 
            
                   $em->persist()->flush();

            return $this->redirectToRoute('admin_evenement_edit', array('id' => $evenement->getIdevenement()));
        }

        return $this->render('AdminBundle:evenement:edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evenement entity.
     *
     * @Route("/{id}", name="admin_evenement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Evenement $evenement)
    {
        $form = $this->createDeleteForm($evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenement);
            $em->flush($evenement);
        }

        return $this->redirectToRoute('admin_evenement_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenement $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenement $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_evenement_delete', array('id' => $evenement->getIdevenement())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
