<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lienpropriete
 *
 * @ORM\Table(name="lienpropriete")
 * @ORM\Entity
 */
class Lienpropriete
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPropriete", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpropriete;

    /**
     * @var string
     *
     * @ORM\Column(name="nomProp", type="string", length=100, nullable=false)
     */
    private $nomprop;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=200, nullable=false)
     */
    private $valeur;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Categorie", mappedBy="idpropriete")
     */
    private $idcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Item", mappedBy="idpropriete")
     */
    private $idproduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcategorie = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idpropriete
     *
     * @return integer
     */
    public function getIdpropriete()
    {
        return $this->idpropriete;
    }

    /**
     * Set nomprop
     *
     * @param string $nomprop
     *
     * @return Lienpropriete
     */
    public function setNomprop($nomprop)
    {
        $this->nomprop = $nomprop;

        return $this;
    }

    /**
     * Get nomprop
     *
     * @return string
     */
    public function getNomprop()
    {
        return $this->nomprop;
    }

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return Lienpropriete
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Add idcategorie
     *
     * @param \Lambda\LambdaBundle\Entity\Categorie $idcategorie
     *
     * @return Lienpropriete
     */
    public function addIdcategorie(\Lambda\LambdaBundle\Entity\Categorie $idcategorie)
    {
        $this->idcategorie[] = $idcategorie;

        return $this;
    }

    /**
     * Remove idcategorie
     *
     * @param \Lambda\LambdaBundle\Entity\Categorie $idcategorie
     */
    public function removeIdcategorie(\Lambda\LambdaBundle\Entity\Categorie $idcategorie)
    {
        $this->idcategorie->removeElement($idcategorie);
    }

    /**
     * Get idcategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Add idproduit
     *
     * @param \Lambda\LambdaBundle\Entity\Item $idproduit
     *
     * @return Lienpropriete
     */
    public function addIdproduit(\Lambda\LambdaBundle\Entity\Item $idproduit)
    {
        $this->idproduit[] = $idproduit;

        return $this;
    }

    /**
     * Remove idproduit
     *
     * @param \Lambda\LambdaBundle\Entity\Item $idproduit
     */
    public function removeIdproduit(\Lambda\LambdaBundle\Entity\Item $idproduit)
    {
        $this->idproduit->removeElement($idproduit);
    }

    /**
     * Get idproduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }
    
    public function __toString() {
        return $this->nomprop;
    }
}
