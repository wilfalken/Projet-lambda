<?php

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    public function indexAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('LambdaBundle:User');
        $users = $repository->myfindAllOrderedByName();
        return $this->render('LambdaBundle:Default:users.html.twig', array(
            'users' => $users
            
        ));
    }
}