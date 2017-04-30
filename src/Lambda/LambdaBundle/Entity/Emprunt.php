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
     * @var string
     *
     * @ORM\Column(name="duree", type="string", nullable=false)
     */
    private $duree;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User", inversedBy="emprunts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idemprunteur", referencedColumnName="id")
     * })
     */
    private $idemprunteur;
    
     /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User", inversedBy="prets")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idproprietaire", referencedColumnName="id")
     * })
     */
    private $idproprietaire;

    /**
     * @var \Lambda\LambdaBundle\Entity\Exemplaire
     *
     * @ORM\OneToOne(targetEntity="Lambda\LambdaBundle\Entity\Exemplaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idExemplaire", referencedColumnName="idexemplaire")
     * })
     */
    private $idexemplaire;

    /**
     * Owning side
     * @var \Lambda\LambdaBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Adresse", inversedBy="emprunts")
     * @ORM\JoinColumn(name="idadresse", referencedColumnName="idadresse")
     */
    private $adresse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateemprunt = new \Datetime;
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
     * Set idproprietaire
     *
     * @param \Lambda\LambdaBundle\Entity\User $idproprietaire
     *
     * @return Emprunt
     */
    public function setIdproprietaire(\Lambda\LambdaBundle\Entity\User $idproprietaire = null)
    {
        $this->idproprietaire = $idproprietaire;

        return $this;
    }

    /**
     * Get idproprietaire
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIdproprietaire()
    {
        return $this->idproprietaire;
    }

    /**
     * Set adresse
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $adresse
     *
     * @return Emprunt
     */
    public function setAdresse(\Lambda\LambdaBundle\Entity\Adresse $adresse = null)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return \Lambda\LambdaBundle\Entity\Adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set duree
     *
     * @param string $duree
     *
     * @return Emprunt
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string
     */
    public function getDuree()
    {
        return $this->duree;
    }
}
