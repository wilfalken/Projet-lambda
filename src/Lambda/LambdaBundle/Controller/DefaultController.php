<?php

namespace Lambda\LambdaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {

    public function indexAction() {







        return $this->render('LambdaBundle:Default:index.html.twig');
    }

    public function connexionAction() {
        return $this->render('LambdaBundle:Default:connexion.html.twig');
    }

    public function inscriptionAction() {
        return $this->render('LambdaBundle:Default:inscription.html.twig');
    }

    public function searchAction() { {

            $form->bind($request);

            //On vérifie que les valeurs entrées sont correctes

            if ($form->isValid()) {

                $em = $this->getDoctrine()->getManager();

                //On récupère les données entrées dans le formulaire par l'utilisateur

                $data = $this->getRequest()->request->get('lambda_lambdabundle_search');

                //On va récupérer la méthode dans le repository afin de trouver toutes les annonces filtrées par les paramètres du formulaire

                $liste_items = $em->getRepository('LambdaBundle:Item')->findItemByNomitem($data);

                //Puis on redirige vers la page de visualisation de cette liste d'annonces

                return $this->render('LambdaBundle:Default:listeItems.html.twig', array('liste_items' => $liste_items));
            }
        }
    }

}
