<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="item")
 * @ORM\Entity
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
     * @ORM\Column(name="photoItem", type="string", length=100, nullable=false)
     */
    private $photoitem;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isValide", type="boolean", nullable=false)
     */
    private $isvalide;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Categorie", inversedBy="iditem")
     * @ORM\JoinTable(name="liencategorie",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idItem", referencedColumnName="idItem")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idCategorie", referencedColumnName="idCategorie")
     *   }
     * )
     */
    private $idcategorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idcategorie = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add idcategorie
     *
     * @param \Lambda\LambdaBundle\Entity\Categorie $idcategorie
     *
     * @return Item
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
}
