<?php

namespace Lambda\BaseBundle\Controller;

use Lambda\LambdaBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of ExemplaireController
 * @Route("/message")
 * @author admin
 */
namespace Lambda\BaseBundle\Controller;

/**
 * Description of MessageControler
 *
 * @author admin
 */
class MessageControler extends Controller{
    
     /**
     * Finds and displays a exemplaire entity.
     *
     * @Route("/{id}", name="base_message_show")
     * @Method("GET")
     */
    public function showAction(Message $message)
    {
        $deleteForm = $this->createDeleteForm($message);

        return $this->render('BaseBundle:message:show.html.twig', array(
            'message' => $message,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
     /**
     * Crée une nouvelle entité Message.
     *
     * @Route("/new", name="base_message_newadmin")
     * @Method({"GET", "POST"})
     */
    public function newadminAction(Request $request, UserInterface $user) {
        
        $message = new Message();
        $em = $this->getDoctrine()->getManager();
        $admin = $em->getRepository('LambdaBundle:User')->findByUsername('admin');
        $form = $this->createForm('Lambda\BaseBundle\Form\MessageadminType', $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($user != null) { //s'il ya un user
                $message->setDestinataire($admin);
                $message->setExpediteur($user);
                $message->setTypemessage("toadmin");
                $em->persist($message);
                $em->flush();
            }
                    return $this->redirectToRoute('base_message_show', array('id' => $message->getIdmessage()));
        }

        return $this->render('BaseBundle:message:new.html.twig', array(
            'message' => $message,
            'form' => $form->createView(),
        ));
    }
    
     /**
     * Crée une nouvelle entité Message.
     *
     * @Route("/{iddest}/new", name="base_message_newadmin")
     * @Method({"GET", "POST"})
     */
    public function newuserAction(Request $request, User $destinataire) {
        
        $user=$this->getUser();
        $message = new Message();
        $message->setDestinataire($destinataire);
        $form = $this->createForm('Lambda\BaseBundle\Form\MessageuserType', $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($user != null) { //s'il ya un user
                
                $message->setExpediteur($user);
                $message->setTypemessage("touser");
                $em->persist($message);
                $em->flush();
            }
                    return $this->redirectToRoute('base_message_show', array('id' => $message->getIdmessage()));
        }

        return $this->render('BaseBundle:message:new.html.twig', array(
            'message' => $message,
            'form' => $form->createView(),
        ));
    }
}
