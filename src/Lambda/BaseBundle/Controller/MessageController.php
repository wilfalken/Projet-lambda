<?php
namespace Lambda\BaseBundle\Controller;


use Lambda\LambdaBundle\Entity\Message;
use Lambda\LambdaBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of MessageController
 * @Route("/message")
 * @author admin
 */
class MessageController extends Controller{
    
 
    
    
    
     /**
     * Crée une nouvelle entité Message.
     *
     * @Route("/newadmin", name="base_message_newadmin")
     * @Method({"GET", "POST"})
     */
    public function newadminAction(Request $request, UserInterface $user) {
        
        $message = new Message();
        $em = $this->getDoctrine()->getManager();
        $admin = $em->getRepository('LambdaBundle:User')->findOneByUsername('admin');
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
     * @Route("/{iddest}/new", name="base_message_newuser")
     * @Method({"GET", "POST"})
     */
    public function newuserAction(Request $request, $iddest) {
        
        $user=$this->getUser();
        $message = new Message();
        $em = $this->getDoctrine()->getManager();
        $destinataire = $em->getRepository('LambdaBundle:User')->find($iddest);
        $form = $this->createForm('Lambda\BaseBundle\Form\MessageuserType', $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($user != null) { //s'il ya un user
                $message->setDestinataire($destinataire);
                $message->setExpediteur($user);
                $message->setTypemessage("touser");
                $em->persist($message);
                $em->flush();
            }
                    return $this->redirectToRoute('base_message_show', array('id' => $message->getIdmessage()));
        }

        return $this->render('BaseBundle:message:new.html.twig', array(
            'message' => $message,
            'user' => $destinataire,
            'form' => $form->createView(),
        ));
    }
    
    
    /**
     * Crée une nouvelle entité Message.
     *
     * @Route("/{id}/delete", name="base_message_delete")
     * @Method({"GET", "DELETE"})
     */
    public function deleteAction(Request $request, Message $message)
    {
       
        $form = $this->createDeleteForm($message);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($message);
            $em->flush($message);
        }

        return $this->redirectToRoute('profil');    ///TODO routing !!!
    }
    
        private function createDeleteForm(Message $message)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('base_message_delete', array('id' => $message->getIdmessage())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    /**
     * Finds and displays a message entity.
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
}
