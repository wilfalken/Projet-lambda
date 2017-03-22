<?php

namespace Lambda\LambdaBundle\Controller;

use Lambda\LambdaBundle\Entity\Item;
use Lambda\LambdaBundle\Entity\Categorie;
use Lambda\LambdaBundle\Entity\Lienpropriete;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Item controller.
 *
 * @Route("item")
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
        foreach ($items as $unitem)
        {
            $id = $unitem->getIditem();
            $categorie= $unitem->getIdcategorie();
        
            $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('LambdaBundle:Item');
            $val = $repository->getValeurProp($unitem);

        
        }
                    return $this->render('item\index.html.twig', array('items' => $items,
               'vals' => $val,
               ));
        
        
        
        
        
        $em = $this->getDoctrine()->getManager();
        $items = $em->getRepository('LambdaBundle:Item')->findAll();
        foreach ($items as $unitem)
        {

        }
        return $this->render('item/index.html.twig', array(
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
        $item = new Item();
        $form = $this->createForm('Lambda\LambdaBundle\Form\ItemType', $item);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($item);
            $em->flush($item);

            return $this->redirectToRoute('item_show', array('id' => $item->getId()));
        }

        return $this->render('item/new.html.twig', array(
            'item' => $item,
            'form' => $form->createView(),
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
        
        $em = $this->getDoctrine()->getManager();
        //$items = $em->getRepository('LambdaBundle:Item')->findAll();
        //foreach ($items as $unitem)
        
            $iditem = $item->getIditem();
            //$collection = $item->getIdCategorie();
            //$idcats = $item->getIdcategorie();
            $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('LambdaBundle:Item');
            $val = $repository->getValeurProp($item);             //($iditem, $idcategorie);
            $prop = $repository->getNomProp($item);             //($iditem, $idcategorie);

        
        

        return $this->render('item/show.html.twig', array(
            'item' => $item,
            'delete_form' => $deleteForm->createView(),
            'vals' => $val,
            'nomprop' => $prop,
            //'propriete' => $prop,
            //'categorie' => $idcategorie,
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
        $editForm = $this->createForm('Lambda\LambdaBundle\Form\ItemType', $item);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('item_edit', array('id' => $item->getId()));
        }

        return $this->render('item/edit.html.twig', array(
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
            ->setAction($this->generateUrl('item_delete', array('id' => $item->getIdItem())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
