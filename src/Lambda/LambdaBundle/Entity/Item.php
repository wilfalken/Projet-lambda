<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity(repositoryClass="Lambda\LambdaBundle\Repository\ItemRepository")
 */
class Item
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idItem", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iditem;

    /**
     * @var string
     *
     * @ORM\Column(name="nomItem", type="string", length=50, nullable=false)
     */
    private $nomitem;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=150, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="photoItem", type="string", length=150, nullable=false)
     * 
     * @Assert\Image(
     *     minWidth = 100,
     *     maxWidth = 1000,
     *     minHeight = 250,
     *     maxHeight = 600
     * )
     */
    private $photoitem;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isValide", type="boolean", nullable=false)
     */
    private $isvalide;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Categorie", inversedBy="items", fetch="EAGER")
     * @ORM\JoinColumn(name="idCategorie", referencedColumnName="idCategorie")
     * 
     */
    private $categorie;
    
     /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Lambda\LambdaBundle\Entity\Exemplaire", mappedBy="item")
     *
     */
    private $exemplaires;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Lienpropriete", inversedBy="idproduit")
     * @ORM\JoinTable(name="produitpropriete",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idproduit", referencedColumnName="idItem")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idpropriete", referencedColumnName="idPropriete")
     *   }
     * )
     */
    private $idpropriete;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->exemplaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idpropriete = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get iditem
     *
     * @return integer
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * Set nomitem
     *
     * @param string $nomitem
     *
     * @return Item
     */
    public function setNomitem($nomitem)
    {
        $this->nomitem = $nomitem;

        return $this;
    }

    /**
     * Get nomitem
     *
     * @return string
     */
    public function getNomitem()
    {
        return $this->nomitem;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Item
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set photoitem
     *
     * @param string $photoitem
     *
     * @return Item
     */
    public function setPhotoitem($photoitem)
    {
        $this->photoitem = $photoitem;

        return $this;
    }

    /**
     * Get photoitem
     *
     * @return string
     */
    public function getPhotoitem()
    {
        return $this->photoitem;
    }

    /**
     * Set isvalide
     *
     * @param boolean $isvalide
     *
     * @return Item
     */
    public function setIsvalide($isvalide)
    {
        $this->isvalide = $isvalide;

        return $this;
    }

    /**
     * Get isvalide
     *
     * @return boolean
     */
    public function getIsvalide()
    {
        return $this->isvalide;
    }

//    /**
//     * Add idcategorie
//     *
//     * @param \Lambda\LambdaBundle\Entity\Categorie $idcategorie
//     *
//     * @return Item
//     */
//    public function addIdcategorie(\Lambda\LambdaBundle\Entity\Categorie $idcategorie)
//    {
//        $this->idcategorie[] = $idcategorie;
//
//        return $this;
//    }
//
//    /**
//     * Remove idcategorie
//     *
//     * @param \Lambda\LambdaBundle\Entity\Categorie $idcategorie
//     */
//    public function removeIdcategorie(\Lambda\LambdaBundle\Entity\Categorie $idcategorie)
//    {
//        $this->idcategorie->removeElement($idcategorie);
//    }

 //   /**
 //    * Get idcategorie
 //    *
 //    * @return \Doctrine\Common\Collections\Collection
 //    */
//    public function getIdcategorie()
//    {
//        return $this->idcategorie;
//    }

    /**
     * Add idpropriete
     *
     * @param \Lambda\LambdaBundle\Entity\Lienpropriete $idpropriete
     *
     * @return Item
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
    public function removeIdpropriete(\Lambda\LambdaBundle\Entity\Lienpropriete $idpropriete)
    {
        $this->idpropriete->removeElement($idpropriete);
    }

    /**
     * Get idpropriete
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdpropriete()
    {
        return $this->idpropriete;
    }

//    /**
//     * Set idcategorie
//     *
//     * @param \Lambda\LambdaBundle\Entity\Categorie $idcategorie
//     *
//     * @return Item
//     */
//    public function setIdcategorie(\Lambda\LambdaBundle\Entity\Categorie $idcategorie = null)
//    {
//        $this->idcategorie = $idcategorie;
//
//        return $this;
//    }
//
//    /**
//     * Get idcategorie
//     *
//     * @return \Lambda\LambdaBundle\Entity\Categorie
//     */
//    public function getIdcategorie()
//    {
//        return $this->idcategorie;
//    }

    /**
     * Set categorie
     *
     * @param \Lambda\LambdaBundle\Entity\Categorie $categorie
     *
     * @return Item
     */
    public function setCategorie(\Lambda\LambdaBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Lambda\LambdaBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add exemplaire
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $exemplaire
     *
     * @return Item
     */
    public function addExemplaire(\Lambda\LambdaBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires[] = $exemplaire;

        return $this;
    }

    /**
     * Remove exemplaire
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $exemplaire
     */
    public function removeExemplaire(\Lambda\LambdaBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires->removeElement($exemplaire);
    }

    /**
     * Get exemplaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExemplaires()
    {
        return $this->exemplaires;
    }
}
