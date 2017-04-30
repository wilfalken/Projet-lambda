<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Repository;

/**
 * Description of ItemRepository
 *
 * @author admin
 */
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

class ItemRepository extends EntityRepository {

    //methodes et requetes ici
    //pas vraiment besoin pour le moment car il existe les "methodes magiques"
    // voir : https://openclassrooms.com/courses/developpez-votre-site-web-avec-le-framework-symfony2/recuperer-ses-entites-avec-doctrine2
    // On n'ajoute pas de critère ou tri particulier, la construction
    // de notre requête est finie

    public function getValeurProp($item) { // requete ??? : pp.idpropriete, 
    // On récupère la Query à partir du QueryBuilder
//        $query = $this->_em->createQuery('SELECT p.valeur, l.nomprop
//            FROM LambdaBundle:Produitpropriete p, LambdaBundle:Lienpropriete l, LambdaBundle:Liencategoriepropriete lcp
//                WHERE p.idproduit=:iditem AND l.idpropriete=p.idpropriete AND lcp.idcategorie=:idcat');
        
        $query = $this->_em->createQuery('SELECT p.valeur
            FROM LambdaBundle:Produitpropriete p
            WHERE p.idproduit=:iditem'
                )
        ->setParameter('iditem', $item->getIditem());
        //$query->setParameter('idcat', $item->getIdcategorie()->first()->getIdcategorie());


        // On récupère les résultats à partir de la Query

        $results = $query->getResult();


        // On retourne ces résultats

        return $results;
    }
    
        public function getNomProp($item) { // requete ??? : pp.idpropriete, 

            $query = $this->_em->createQuery('SELECT l.nomprop FROM LambdaBundle:Lienpropriete l
                     INNER JOIN LambdaBundle:Produitpropriete pp WITH l.idpropriete=pp.idpropriete
                     WHERE pp.idproduit = :iditem');
            $query->setParameter('iditem', $item->getIditem()); //->first()->getIdcategorie());

            $results = $query->getResult();
            
            return $results;
        }
                // On récupère la Query à partir du QueryBuilder
//        $query = $this->_em->createQuery('SELECT p.valeur, l.nomprop
//            FROM LambdaBundle:Produitpropriete p, LambdaBundle:Lienpropriete l, LambdaBundle:Liencategoriepropriete lcp
//                WHERE p.idproduit=:iditem AND l.idpropriete=p.idpropriete AND lcp.idcategorie=:idcat');
        
//        $query = $this->_em->createQuery('SELECT LP.nomprop
//            FROM LambdaBundle:Liencategoriepropriete L
//            INNER JOIN LambdaBundle:Lienpropriete LP WITH L.idcategorie=LP.idcategorie
//            WHERE L.idcategorie=:idcat')
//        ->setParameter('idcat', $idcategorie); //->first()->getIdcategorie());
            //$categorie = $idcategorie->first()->getCategorie();

        


        // On retourne ces résultats

  
}