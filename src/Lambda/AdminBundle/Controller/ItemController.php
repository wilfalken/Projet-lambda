<?php

namespace Lambda\AdminBundle\Controller;

use Lambda\LambdaBundle\Entity\Item;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Item controller.
 *
 * @Route("/admin/item")
 */
class ItemController extends Controller
{
    /**
     * Lists all item entities.
     *
     * @Route("/", name="item_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $items = $em->getRepository('LambdaBundle:Item')->findAll();

        return $this->render('AdminBundle:item:index.html.twig', array(
            'items' => $items,
        ));
    }

    /**
     * Creates a new item entity.
     *
     * @Route("/new", name="item_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        
        //$nompropriete -> $em->vreatQueryBuiler()                          ;
                
                
        $item = new Item();
        $form = $this->createForm('Lambda\LambdaBundle\Form\ItemType', $item);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $file=$item->getPhotoitem(); //cherche la photo
            $fileName = md5(uniqid()).'.'.$file->guessExtension(); //génération nom de fichier
            $file->move($this->getParameter('photo_item_directory'),$fileName); //trouve où mettre le fichier (config.yml)
            $item->setPhotoitem($fileName); //force le stockage du nom de fichier au lieu du contenu
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            
//            $nomproprietes = $this->getDoctrine()
//                ->getRepository('LambdaBundle:Lienpropriete')
//                ->findByIdcategorie($item->getIdcategorie);
            $em->flush($item);

            return $this->redirectToRoute('item_show', array('id' => $item->getIditem()));
        }

        return $this->render('AdminBundle:item:new.html.twig', array(
            'item' => $item,
            'form' => $form->createView(),
            //'nomproprietes' =>$nomproprietes,
        ));
    }

    /**
     * Finds and displays a item entity.
     *
     * @Route("/{id}", name="item_show")
     * @Method("GET")
     */
    public function showAction(Item $item)
    {
        $deleteForm = $this->createDeleteForm($item);
        return $this->render('AdminBundle:item:show.html.twig', array(
            'item' => $item,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing item entity.
     *
     * @Route("/{id}/edit", name="item_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Item $item)
    {
        $deleteForm = $this->createDeleteForm($item);
        $editForm = $this->createForm('Lambda\LambdaBundle\Form\ItemEditType', $item);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $file=$item->getPhotoitem(); //cherche la photo
            $fileName = md5(uniqid()).'.'.$file->guessExtension(); //génération nom de fichier
            $file->move($this->getParameter('photo_item_directory'),$fileName); //trouve où mettre le fichier (config.yml)
            $item->setPhotoitem($fileName); //force le stockage du nom de fichier au lieu du contenu
            $this->getDoctrine()->getManager()->flush();

            return $this->render('AdminBundle:item:show.html.twig', array('item' => $item,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),));
        }

        return $this->render('AdminBundle:item:edit.html.twig', array(
            'item' => $item,
            
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a item entity.
     *
     * @Route("/{id}", name="item_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Item $item)
    {
        $form = $this->createDeleteForm($item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($item);
            $em->flush($item);
        }

        return $this->redirectToRoute('item_index');
    }

    /**
     * Creates a form to delete a item entity.
     *
     * @param Item $item The item entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Item $item)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('item_delete', array('id' => $item->getIditem())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
