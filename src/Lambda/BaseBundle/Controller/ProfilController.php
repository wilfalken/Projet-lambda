<?php
namespace Lambda\BaseBundle\Controller;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProfilController
 *
 * @author admin
 */

use Lambda\LambdaBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of MessageController
 * @Route("/profil")
 * @author admin
 */
class ProfilController extends Controller{
    
    /**
    * Description of MessageController
    * @Route("/public/{iduser}", name="base_profil_public")
    * @Method({"GET","POST"})
    * @author admin
    */
    public function publicAction(User $iduser)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('LambdaBundle:User')->findOneById($iduser);
        $exemplaires = $user->getExemplaires();
        return $this->render('BaseBundle:Profil:public.html.twig', array('user' => $user, 'exemplaires' => $exemplaires));
    }
    
    /**
    * Description of MessageController
    * @Route("/prive", name="base_profil")
    * @author admin
    */
    public function indexAction()
    {
        $user = $this->getUser();
        $exemplaires = $user->getExemplaires();
        return $this->render('BaseBundle:Profil:public.html.twig', array('user' => $user, 'exemplaires' => $exemplaires));
    }
    /**
    * Description of MessageController
    * @Route("/prive", name="base_profil_prive")
    * @author admin
    */
        public function priveAction()
    {
        $user = $this->getUser();
    
        return $this->render('BaseBundle:Profil:profil.html.twig', array('user' => $user));
    }
}
