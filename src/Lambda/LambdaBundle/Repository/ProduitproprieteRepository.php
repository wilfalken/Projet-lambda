<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Repository;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
 

class ProduitproprieteRepository extends EntityRepository
{
 //methodes et requetes ici
    //pas vraiment besoin pour le moment car il existe les "methodes magiques"
    // voir : https://openclassrooms.com/courses/developpez-votre-site-web-avec-le-framework-symfony2/recuperer-ses-entites-avec-doctrine2


}