<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Exemplaire
 *
 * @ORM\Table(name="exemplaire", indexes={@ORM\Index(name="fk_userexemplaire", columns={"idUser"}), @ORM\Index(name="fk_itemexemplaire", columns={"idItem"})})
 * @ORM\Entity
 */
class Exemplaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idexemplaire", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idexemplaire;

    /**
     * @var string
     *
     * @ORM\Column(name="photoExemplaire", type="string", length=150, nullable=false)
     * 
     * @Assert\Image(
     *     minWidth = 200,
     *     maxWidth = 1000,
     *     minHeight = 100,
     *     maxHeight = 600
     * )
     */
    private $photoexemplaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime", nullable=false)
     */
    private $dateajout;

    /**
     * @var \Lambda\LambdaBundle\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Item", inversedBy="exemplaires", fetch="EAGER")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="idItem")
     * })
     */
    private $item;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User", inversedBy="exemplaires")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var string
     *
     * 
     * @ORM\Column(name="etatExemplaire", type="string", length=250, nullable=false)
     * 
     */
    private $etat;

    function __construct() {
        $this->dateajout = new \Datetime;
    }

    
    
    
    /**
     * Get idexemplaire
     *
     * @return integer
     */
    public function getIdexemplaire()
    {
        return $this->idexemplaire;
    }

    /**
     * Set photoexemplaire
     *
     * @param string $photoexemplaire
     *
     * @return Exemplaire
     */
    public function setPhotoexemplaire($photoexemplaire)
    {
        $this->photoexemplaire = $photoexemplaire;

        return $this;
    }

    /**
     * Get photoexemplaire
     *
     * @return string
     */
    public function getPhotoexemplaire()
    {
        return $this->photoexemplaire;
    }

    /**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     *
     * @return Exemplaire
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

    /**
     * Set iditem
     *
     * @param \Lambda\LambdaBundle\Entity\Item $iditem
     *
     * @return Exemplaire
     */
    public function setIditem(\Lambda\LambdaBundle\Entity\Item $iditem = null)
    {
        $this->iditem = $iditem;

        return $this;
    }

    /**
     * Get iditem
     *
     * @return \Lambda\LambdaBundle\Entity\Item
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * Set iduser
     *
     * @param \Lambda\LambdaBundle\Entity\User $iduser
     *
     * @return Exemplaire
     */
    public function setIduser(\Lambda\LambdaBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Exemplaire
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set user
     *
     * @param \Lambda\LambdaBundle\Entity\User $user
     *
     * @return Exemplaire
     */
    public function setUser(\Lambda\LambdaBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set item
     *
     * @param \Lambda\LambdaBundle\Entity\Item $item
     *
     * @return Exemplaire
     */
    public function setItem(\Lambda\LambdaBundle\Entity\Item $item = null)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return \Lambda\LambdaBundle\Entity\Item
     */
    public function getItem()
    {
        return $this->item;
    }
}
