<?php
namespace Lambda\BaseBundle\Controller;


use Lambda\LambdaBundle\Entity\Message;
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
//    
//    /**
//     * Crée une nouvelle entité Messagedemande de pret.
//     *
//     * @Route("/{idex}/{idprop}/new", name="message_demandepret")
//     * @Method({"GET", "POST"})
//     */
//    public function newdemandeAction(Request $request, $idex, $idprop) {
//        
//        $user=$this->getUser();
//        $message = new Message();
//        $em = $this->getDoctrine()->getManager();
//        $destinataire = $em->getRepository('LambdaBundle:User')->find($idprop);
//        $exemplaire = $em->getRepository('LambdaBundle:Exemplaire')->find($idex);
//        $form = $this->createForm('Lambda\BaseBundle\Form\MessageitemType', $message, array(
//            'exemplaire' => $exemplaire->getItem(),
//            'proprietaire' => $destinataire,
//                ));
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            if ($user != null) { //s'il ya un user
//                $message->setDestinataire($destinataire);
//                $message->setExpediteur($user);
//                $message->setTypemessage("dempret");
//                $em->persist($message);
//                $em->flush();
//            }
//                    return $this->redirectToRoute('base_message_show', array('id' => $message->getIdmessage()));
//        }
//
//        return $this->render('BaseBundle:message:new.html.twig', array(
//            'message' => $message,
//            'user' => $destinataire,
//            'form' => $form->createView(),
//        ));
//    }
    
        
    /**
     * Crée une nouvelle entité Messagedemande de pret.
     *
     * @Route("/{idex}/{idprop}/new", name="message_demandepret")
     * @Method({"GET", "POST"})
     */
    public function newdemandeAction(Request $request, $idex, $idprop) {
        
        $user=$this->getUser();
        $message = new Message();
        $em = $this->getDoctrine()->getManager();
        $destinataire = $em->getRepository('LambdaBundle:User')->find($idprop);
        $exemplaire = $em->getRepository('LambdaBundle:Exemplaire')->find($idex);
        $text = '<div class="container">L\'utilisateur '.$user->getUsername().' vous demande le prêt de l\'objet : '.$exemplaire->getItem()->getNomitem().
                '. Vous pouvez soit accepter, soit refuser le pret de cet objet.</br>'.
                'Si vous acceptez, nous vous invitons à contacter le demandeur par l\'intermédiare de ce bouton, pour convenir d\'un rendez-vous par exemple:'.
                '<a class="btn btn-primary btn-xs" href="{{ path(\'base_message_newuser\', {\'iddest\':'.$user->getId().'} ) }}">Contacter le demandeur</a>'.
                '</br>Après cela, je vous invite à signaler à l\'application, et afin d\'éviter les problèmes, un nouvel emprunt de cet objet, par l\'intérmédiaire de ce bouton :'.
                '<a class="btn btn-primary btn-xs" href="{{ path(\'base_emprunt_new\', {\'idexemplaire\':'.$exemplaire->getIdexemplaire().', \'idemprunteur\': '.$user->getId().' } ) }}">Nouvel emprunt</a>'.
                '</br>Bonne journée et amusez-vous bien !';
        $sujet = 'Demande de pret de l\'objet : '.$exemplaire->getItem()->getNomitem();     
            if ($user != null) { //s'il ya un user
                $message->setCorps($text);
                $message->setSujet($sujet);
                $message->setDestinataire($destinataire);
                $message->setExpediteur($user);
                $message->setTypemessage("dempret");
                $em->persist($message);
                $em->flush();
            }
            return $this->redirectToRoute('base_profil');
//        return $this->redirectToRoute('base_message_show', array('id' => $message->getIdmessage()));
    }
    
}
