<?php

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('LambdaBundle:Default:index.html.twig');

    }
    
    public function connexionAction()
    {
        return $this->render('LambdaBundle:Default:connexion.html.twig');
    }
    
    public function inscriptionAction()
    {
        return $this->render('LambdaBundle:Default:inscription.html.twig');
    }
}
