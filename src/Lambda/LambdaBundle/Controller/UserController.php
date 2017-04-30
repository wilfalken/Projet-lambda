<?php

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Lambda\LambdaBundle\Entity\Item;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UserController extends Controller {

    public function indexAction() {
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
