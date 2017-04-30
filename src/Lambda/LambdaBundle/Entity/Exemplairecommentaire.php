<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Entity;

use Lambda\LambdaBundle\Entity\BaseCommentaire;
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Usercommentaire
 * 
 * @ORM\InheritanceType("JOINED")
 * @author admin
 */
abstract class Exemplairecommentaire extends BaseCommentaire 

{
     /**
     * @var \Lambda\LambdaBundle\Entity\Exemplaire
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Exemplaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommente", referencedColumnName="idexemplaire")
     * })
     */
    protected $idexcommente;
}
