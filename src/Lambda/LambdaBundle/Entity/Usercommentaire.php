<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Lambda\LambdaBundle\Entity;

use Lambda\LambdaBundle\Entity\BaseCommentaire; // * @ORM\DiscriminatorColumn(name="type", type="string")
                                                // * @ORM\DiscriminatorMap({"noteuser" = "NoteUser", "textuser" = "textuser"})
use Doctrine\ORM\Mapping as ORM;

/**
 * Description of Usercommentaire
 * 
 * @ORM\InheritanceType("JOINED")
 *
 * @author admin
 */
abstract class Usercommentaire extends BaseCommentaire 

{
     /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommente", referencedColumnName="id")
     * })
     */
    protected $idusercommente;
}
