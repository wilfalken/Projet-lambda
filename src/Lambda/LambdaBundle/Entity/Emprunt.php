<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Emprunt
 *
 * @ORM\Table(name="emprunt", indexes={@ORM\Index(name="fk_empruntexemplaire", columns={"idExemplaire"}), @ORM\Index(name="fk_idemprunteur", columns={"idemprunteur"})})
 * @ORM\Entity
 */
class Emprunt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEmprunt", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idemprunt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmprunt", type="datetime", nullable=false)
     */
    private $dateemprunt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRendu", type="datetime", nullable=false)
     */
    private $daterendu;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idemprunteur", referencedColumnName="id")
     * })
     */
    private $idemprunteur;

    /**
     * @var \Lambda\LambdaBundle\Entity\Exemplaire
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Exemplaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idExemplaire", referencedColumnName="idexemplaire")
     * })
     */
    private $idexemplaire;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Adresse", mappedBy="idemprunt")
     */
    private $idadresseuser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idadresseuser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idemprunt
     *
     * @return integer
     */
    public function getIdemprunt()
    {
        return $this->idemprunt;
    }

    /**
     * Set dateemprunt
     *
     * @param \DateTime $dateemprunt
     *
     * @return Emprunt
     */
    public function setDateemprunt($dateemprunt)
    {
        $this->dateemprunt = $dateemprunt;

        return $this;
    }

    /**
     * Get dateemprunt
     *
     * @return \DateTime
     */
    public function getDateemprunt()
    {
        return $this->dateemprunt;
    }

    /**
     * Set daterendu
     *
     * @param \DateTime $daterendu
     *
     * @return Emprunt
     */
    public function setDaterendu($daterendu)
    {
        $this->daterendu = $daterendu;

        return $this;
    }

    /**
     * Get daterendu
     *
     * @return \DateTime
     */
    public function getDaterendu()
    {
        return $this->daterendu;
    }

    /**
     * Set idemprunteur
     *
     * @param \Lambda\LambdaBundle\Entity\User $idemprunteur
     *
     * @return Emprunt
     */
    public function setIdemprunteur(\Lambda\LambdaBundle\Entity\User $idemprunteur = null)
    {
        $this->idemprunteur = $idemprunteur;

        return $this;
    }

    /**
     * Get idemprunteur
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIdemprunteur()
    {
        return $this->idemprunteur;
    }

    /**
     * Set idexemplaire
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $idexemplaire
     *
     * @return Emprunt
     */
    public function setIdexemplaire(\Lambda\LambdaBundle\Entity\Exemplaire $idexemplaire = null)
    {
        $this->idexemplaire = $idexemplaire;

        return $this;
    }

    /**
     * Get idexemplaire
     *
     * @return \Lambda\LambdaBundle\Entity\Exemplaire
     */
    public function getIdexemplaire()
    {
        return $this->idexemplaire;
    }

    /**
     * Add idadresseuser
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $idadresseuser
     *
     * @return Emprunt
     */
    public function addIdadresseuser(\Lambda\LambdaBundle\Entity\Adresse $idadresseuser)
    {
        $this->idadresseuser[] = $idadresseuser;

        return $this;
    }

    /**
     * Remove idadresseuser
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $idadresseuser
     */
    public function removeIdadresseuser(\Lambda\LambdaBundle\Entity\Adresse $idadresseuser)
    {
        $this->idadresseuser->removeElement($idadresseuser);
    }

    /**
     * Get idadresseuser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdadresseuser()
    {
        return $this->idadresseuser;
    }
}
