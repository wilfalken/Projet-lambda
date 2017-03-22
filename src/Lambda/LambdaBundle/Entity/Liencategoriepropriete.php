<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Liencategoriepropriete
 *
 * @ORM\Table(name="liencategoriepropriete")
 * @ORM\Entity
 */
class Liencategoriepropriete
{
    /**
     * @var Integer  ////\Doctrine\Common\Collections\Collection
     *
     * @ORM\Column(name="idpropriete", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idpropriete;

    /**
     * @var Integer      /////       \Doctrine\Common\Collections\Collection
     * @ORM\Column(name="idcategorie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idcategorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idpropriete;// = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idcategorie;// = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idpropriete
     *
     * @return Integer ////\Doctrine\Common\Collections\Collection
     */
    public function getIdpropriete()
    {
        return $this->idpropriete;
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
     * @return Integer ///\Doctrine\Common\Collections\Collection
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }
    
     /**
     * Add idpropriete
     * 
     * @param \Lambda\LambdaBundle\Entity\lienpropriete $idpropriete
     *
     * @return Lienpropriete
     */
    public function addIdpropriete(\Lambda\LambdaBundle\Entity\Lienpropriete $idpropriete)
    {
        $this->idpropriete[] = $idpropriete;

        return $this;
    }
    
     /**
     * Remove idpropriete
     *
     * @param \Lambda\LambdaBundle\Entity\Lienpropriete $idpropriete
     */
    public function removeIdpropriete(\Lambda\LambdaBundle\Entity\Categorie $idpropriete)
    {
        $this->idcategorie->removeElement($idpropriete);
    }

    /**
     * Set idpropriete
     *
     * @param integer $idpropriete
     *
     * @return Liencategoriepropriete
     */
    public function setIdpropriete($idpropriete)
    {
        $this->idpropriete = $idpropriete;

        return $this;
    }

    /**
     * Set idcategorie
     *
     * @param integer $idcategorie
     *
     * @return Liencategoriepropriete
     */
    public function setIdcategorie($idcategorie)
    {
        $this->idcategorie = $idcategorie;

        return $this;
    }
}
