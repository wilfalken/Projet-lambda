<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="photoExemplaire", type="string", length=150, nullable=true)
     */
    private $photoexemplaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime", nullable=false)
     */
    private $dateajout = 'CURRENT_TIMESTAMP';

    /**
     * @var \Lambda\LambdaBundle\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="idItem")
     * })
     */
    private $iditem;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    private $iduser;



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
}
