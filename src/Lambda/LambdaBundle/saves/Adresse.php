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
     * Owning side
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\User", inversedBy="adresses")
     *      * @ORM\JoinTable(name="adresseuser",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idadresse", referencedColumnName="idadresse")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     *   }
     * )
     */
    private $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Lambda\LambdaBundle\Entity\Emprunt", mappedBy="adresse")
     */
    private $emprunts;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->emprunts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add emprunt
     *
     * @param \Lambda\LambdaBundle\Entity\Emprunt $emprunt
     *
     * @return Adresse
     */
    public function addEmprunt(\Lambda\LambdaBundle\Entity\Emprunt $emprunt)
    {
        $this->emprunts[] = $emprunt;

        return $this;
    }

    /**
     * Remove emprunt
     *
     * @param \Lambda\LambdaBundle\Entity\Emprunt $emprunt
     */
    public function removeEmprunt(\Lambda\LambdaBundle\Entity\Emprunt $emprunt)
    {
        $this->emprunts->removeElement($emprunt);
    }

    /**
     * Get emprunts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmprunts()
    {
        return $this->emprunts;
    }

    /**
     * Add user
     *
     * @param \Lambda\LambdaBundle\Entity\User $user
     *
     * @return Adresse
     */
    public function addUser(\Lambda\LambdaBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Lambda\LambdaBundle\Entity\User $user
     */
    public function removeUser(\Lambda\LambdaBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }
}
