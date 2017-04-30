<?php

namespace Lambda\BaseBundle\Controller;

use Lambda\LambdaBundle\Entity\Adresse;
use Lambda\LambdaBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Adresse controller.
 *
 * @Route("/adresse")
 */
class AdressebaseController extends Controller
{
    /**
     * Lists all adresse entities.
     *
     * @Route("/", name="base_adresse_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        
        $em = $this->getDoctrine()->getManager();

        $adresses = $em->getRepository('LambdaBundle:Adresse')->findAll();
        
        return $this->render('BaseBundle:adresse:index.html.twig', array(
            'adresses' => $adresses,
            
        ));
    }
    


    /**
     * Creates a new adresse entity.
     *
     * @Route("/new", name="base_adresse_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, UserInterface $user)
    {
        $adresse = new Adresse();
        $form = $this->createForm('Lambda\LambdaBundle\Form\AdressebaseType', $adresse);
        $form->handleRequest($request);
        //$idUser = $user->getIduser();
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $anciennes = $user->getAdresses();
            $data = $form->getData();
            $princ = $data->getPrincipale();
            if ($princ == true){
                foreach ($anciennes as $uneadresse){
                    $uneadresse->setPrincipale(false);
                    $em->persist($uneadresse);
                    $em->flush($uneadresse);
                }
                $adresse->setPrincipale(true);
            }
            if ($user != null) { //s'il ya un user
            
            $adresse->addUser($user);
            $user->addAdress($adresse);
        }
            $em->persist($adresse);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('base_adresse_show', array('id' => $adresse->getIdadresse()));
        }

        return $this->render('BaseBundle:adresse:new.html.twig', array(
            'adresse' => $adresse,
            'form' => $form->createView(),
        ));
    }
    
        /**
     * Liste les adresses d'un utilisateur
     *
     * @Route("/{user}", name="base_mesadresses")
     * @Method("GET")
     */
    public function mesadressesAction(User $user)
    {
        
        $adresses = $user->getAdresses();
        
        return $this->render('BaseBundle:adresse:index.html.twig', array(
            
            'adresses' => $adresses,
            
        ));
    }

    /**
     * Finds and displays a adresse entity.
     *
     * @Route("/{id}/show", name="base_adresse_show")
     * @Method("GET")
     */
    public function showAction(Adresse $adresse)
    {
        $deleteForm = $this->createDeleteForm($adresse);

        return $this->render('BaseBundle:adresse:show.html.twig', array(
            'adresse' => $adresse,
            'delete_form2' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing adresse entity.
     *
     * @Route("/{id}/edit", name="base_adresse_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Adresse $adresse)
    {
        $deleteForm = $this->createDeleteForm($adresse);
        $editForm = $this->createForm('Lambda\LambdaBundle\Form\AdressebaseType', $adresse);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('base_adresse_show', array('id' => $adresse->getIdadresse()));
        }
        //return $this->redirectToRoute('base_adresse_show')
        return $this->render('BaseBundle:adresse:edit.html.twig', array(
            'adresse' => $adresse,
           'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a adresse entity.
     *
     * @Route("/{id}", name="base_adresse_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Adresse $adresse)
    {
       
        $form = $this->createDeleteForm($adresse);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($adresse);
            //$em->persist($adresse);
            $em->flush($adresse);
        }

        return $this->redirectToRoute('base_adresse_index');
    }

    /**
     * Creates a form to delete a adresse entity.
     *
     * @param Adresse $adresse The adresse entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Adresse $adresse)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('base_adresse_delete', array('id' => $adresse->getIdadresse())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
