<?php

namespace Lambda\BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();
         return $this->redirect($this->generateUrl('profil', array( 'user' => $user )));
    }
}
