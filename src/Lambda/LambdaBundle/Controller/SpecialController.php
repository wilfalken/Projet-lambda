<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lambda\LambdaBundle\Entity\Item;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
/**
 * Description of SpecialController
 * @route("/usersrc")
 * @author admin
 */
class SpecialController extends Controller{
    
    /**
    * @Route("/{iditem}", name="base_usersrc")
    * @Method({"GET", "POST"})
    */
    public function paritemAction($iditem) {
        $em = $this->getDoctrine()->getManager();
        $item = $em->getRepository('LambdaBundle:Item')->findOneByIditem($iditem);
        
        $liste_users = array();
        $liste_exemplaires = $em->getRepository('LambdaBundle:Exemplaire')->findByItem($item);
        foreach ($liste_exemplaires as $unexemplaire)
        {
            $liste_users[] = $em->getRepository('LambdaBundle:User')->find($unexemplaire->getUser());
        }
        return $this->render('LambdaBundle:Search:listeusers.html.twig', array('liste_users' => $liste_users));
    }
}
