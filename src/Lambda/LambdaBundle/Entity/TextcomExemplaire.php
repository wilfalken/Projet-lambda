<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lambda\LambdaBundle\Entity\Exemplairecommentaire;
/**
 * Texte
 *
 * @ORM\Table(name="textcomexemplaire", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CFBDFA1427AD97C4", columns={"idCommentaire"})})
 * @ORM\Entity
 */
class TextcomExemplaire extends Exemplairecommentaire
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
     * @param string $textcom
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
     * Set idexcommente
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $idexcommente
     *
     * @return TextComExemplaire
     */
    public function setIdexcommente(\Lambda\LambdaBundle\Entity\Exemplaire $idexcommente = null)
    {
        $this->idexcommente = $idexcommente;

        return $this;
    }

    /**
     * Get idexcommente
     *
     * @return \Lambda\LambdaBundle\Entity\Exemplaire
     */
    public function getIdexcommente()
    {
        return $this->idexcommente;
    }
}
