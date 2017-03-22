<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresse
 *
 * @ORM\Table(name="adresse")
 * @ORM\Entity
 */
class Adresse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idadresse", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idadresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="numRue", type="integer", nullable=false)
     */
    private $numrue;

    /**
     * @var string
     *
     * @ORM\Column(name="textAdresse", type="string", length=100, nullable=false)
     */
    private $textadresse;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=100, nullable=false)
     */
    private $complement;

    /**
     * @var integer
     *
     * @ORM\Column(name="cp", type="integer", nullable=false)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string", length=100, nullable=false)
     */
    private $pays;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\User", mappedBy="idadresse")
     */
    private $iduser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iduser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idadresse
     *
     * @return integer
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }

    /**
     * Set numrue
     *
     * @param integer $numrue
     *
     * @return Adresse
     */
    public function setNumrue($numrue)
    {
        $this->numrue = $numrue;

        return $this;
    }

    /**
     * Get numrue
     *
     * @return integer
     */
    public function getNumrue()
    {
        return $this->numrue;
    }

    /**
     * Set textadresse
     *
     * @param string $textadresse
     *
     * @return Adresse
     */
    public function setTextadresse($textadresse)
    {
        $this->textadresse = $textadresse;

        return $this;
    }

    /**
     * Get textadresse
     *
     * @return string
     */
    public function getTextadresse()
    {
        return $this->textadresse;
    }

    /**
     * Set complement
     *
     * @param string $complement
     *
     * @return Adresse
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * Get complement
     *
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set cp
     *
     * @param integer $cp
     *
     * @return Adresse
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return integer
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Adresse
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Adresse
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Add iduser
     *
     * @param \Lambda\LambdaBundle\Entity\User $iduser
     *
     * @return Adresse
     */
    public function addIduser(\Lambda\LambdaBundle\Entity\User $iduser)
    {
        $this->iduser[] = $iduser;

        return $this;
    }

    /**
     * Remove iduser
     *
     * @param \Lambda\LambdaBundle\Entity\User $iduser
     */
    public function removeIduser(\Lambda\LambdaBundle\Entity\User $iduser)
    {
        $this->iduser->removeElement($iduser);
    }

    /**
     * Get iduser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIduser()
    {
        return $this->iduser;
    }
    
    public function __toString() {
        return $this->getIduser()->getId();
    }
}
