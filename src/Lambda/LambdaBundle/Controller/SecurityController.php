<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Controller;

use Lambda\LambdaBundle\Form\UserType;
use Lambda\LambdaBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of loginControler
 *
 * @author admin
 */
class SecurityController extends Controller {

    /**
     * @Route("/login", name="login")
     */
    public function logincheckAction() {
        if ($this->getUser()) {
            return $this->render('LambdaBundle:Default:index.html.twig');
        } else {
            return $this->render('LambdaBundle:Default:login.html.twig');
        }
    }

    public function loginAction(Request $request) { 
//        $user = $this->getUser();
//        if ($user instanceof UserInterface) {
//            return $this->redirectToRoute('users');
//        }



        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('LambdaBundle:Default:login.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error,));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request) {
        $this->container->get('security.token_storage')->setToken(null);
        $this->get('request')->getSession()->invalidate();

        return $this->render('LambdaBundle:Default:index.html.twig');
    }
    
     /**
     * @Route("/register", name="register")
     */    
    public function registerAction(Request $request) {
         // 1) build the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setUsernameCanonical($user->getUsername());
            $user->setEmailCanonical($user->getEmail());

            // 4) save the User!
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - 
            // maybe set a "flash" success message for the user

            return $this->redirectToRoute('homepage');
        }

        return $this->render(
            'LambdaBundle:Default:inscription.html.twig',
            array('form' => $form->createView())
        );
    }
}
