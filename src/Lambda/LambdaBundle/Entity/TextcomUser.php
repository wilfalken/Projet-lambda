<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lambda\LambdaBundle\Entity\Usercommentaire;
/**
 * Texte
 *
 * @ORM\Table(name="textcomuser", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CFBDFA1427AD97C4", columns={"idCommentaire"})})
 * @ORM\Entity
 */
class TextcomUser extends Usercommentaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="textcom", type="string", nullable=false)
     */
    protected $textcom;
    
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Set textcom
     *
     * @param integer $textcom
     *
     * @return Textcom
     */
    public function setTextcom($textcom)
    {
        $this->textcom = $textcom;

        return $this;
    }

    /**
     * Get textcom
     *
     * @return string
     */
    public function getTextcom()
    {
        return $this->textcom;
    }

    /**
     * Set idusercommente
     *
     * @param \Lambda\LambdaBundle\Entity\User $idusercommente
     *
     * @return TextComUser
     */
    public function setIdusercommente(\Lambda\LambdaBundle\Entity\User $idusercommente = null)
    {
        $this->idusercommente = $idusercommente;

        return $this;
    }

    /**
     * Get idusercommente
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIdusercommente()
    {
        return $this->idusercommente;
    }
}
