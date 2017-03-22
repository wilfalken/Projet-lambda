<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Repository;

/**
 * Description of UserRepository
 *
 * @author admin
 */
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
 

class UserRepository extends EntityRepository
{
    public function myfindAllOrderedByName()
    {
        $queryBuilder = $this->_em->createQueryBuilder()
                                ->select('user')
                                ->from($this->_entityName, 'user');
        
        $query = $queryBuilder->getQuery();
        $results=$query->getResult();

            return $results;
    }


}