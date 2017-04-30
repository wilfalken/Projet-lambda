<?php

namespace Lambda\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DefaultController extends Controller {

    public function indexAction() {
        if (($this->getUser())) {
            if (in_array('ROLE_ADMIN', $this->getUser()->getRoles())) {
                return $this->render('AdminBundle:Default:index.html.twig');
            }
        }
        throw new AccessDeniedHttpException;
    }

}
