<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of ExemplaireController
 *
 * @author admin
 */
class ExemplaireController extends Controller{
    
    public function showExemplaires($user)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('LambdaBundle:Exemplaire');
        $exemplaires= $repository->findByIduser($user->getId());
        return $this->render('LambdaBundle:Default:exemplaires.html.twig', array(
            'exemplaires' => $exemplaires
                ));
    }
}
