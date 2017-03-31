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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

class ProfilController extends Controller{
    public function indexAction()
    {
        $user = $this->getUser();
    
        return $this->render('BaseBundle:Default:profil.html.twig', array('user' => $user));
    }
}
