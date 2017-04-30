<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity
 */
class Evenement
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEvenement", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="titreEvenement", type="string", length=100, nullable=false)
     */
    private $titreevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="texteEvenement", type="text", length=65535, nullable=false)
     */
    private $texteevenement;

    /**
     * @var string
     *
     * @ORM\Column(name="lienImage", type="string", length=150, nullable=false)
     * 
     * @Assert\Image(
     *     minWidth = 600,
     *     maxWidth = 1000,
     *     minHeight = 400,
     *     maxHeight = 600
     * )
     */
    private $lienimage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime", nullable=false)
     */
    private $dateajout;


    public function __construct()
    {
        $this->dateajout = new \Datetime;
    }
    
    /**
     * Get idevenement
     *
     * @return integer
     */
    public function getIdevenement()
    {
        return $this->idevenement;
    }

    /**
     * Set titreevenement
     *
     * @param string $titreevenement
     *
     * @return Evenement
     */
    public function setTitreevenement($titreevenement)
    {
        $this->titreevenement = $titreevenement;

        return $this;
    }

    /**
     * Get titreevenement
     *
     * @return string
     */
    public function getTitreevenement()
    {
        return $this->titreevenement;
    }

    /**
     * Set texteevenement
     *
     * @param string $texteevenement
     *
     * @return Evenement
     */
    public function setTexteevenement($texteevenement)
    {
        $this->texteevenement = $texteevenement;

        return $this;
    }

    /**
     * Get texteevenement
     *
     * @return string
     */
    public function getTexteevenement()
    {
        return $this->texteevenement;
    }

    /**
     * Set lienimage
     *
     * @param string $lienimage
     *
     * @return Evenement
     */
    public function setLienimage($lienimage)
    {
        $this->lienimage = $lienimage;

        return $this;
    }

    /**
     * Get lienimage
     *
     * @return string
     */
    public function getLienimage()
    {
        return $this->lienimage;
    }

    /**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     *
     * @return Evenement
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    /**
     * Get dateajout
     *
     * @return \DateTime
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }
}
