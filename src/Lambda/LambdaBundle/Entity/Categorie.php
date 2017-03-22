<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="Lambda\LambdaBundle\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCategorie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCategorie", type="string", length=50, nullable=false)
     */
    private $nomcategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Item", mappedBy="idcategorie")
     */
    private $iditem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Lienpropriete", inversedBy="idcategorie")
     * @ORM\JoinTable(name="liencategoriepropriete",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idcategorie", referencedColumnName="idCategorie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idpropriete", referencedColumnName="idPropriete")
     *   }
     * )
     */
    private $idpropriete;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Souscategorie", inversedBy="idiscategorie")
     * @ORM\JoinTable(name="liensouscategorie",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idisCategorie", referencedColumnName="idCategorie")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idSousCategorie", referencedColumnName="idSousCategorie")
     *   }
     * )
     */
    private $idsouscategorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->iditem = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idpropriete = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idsouscategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idcategorie
     *
     * @return integer
     */
    public function getIdcategorie()
    {
        return $this->idcategorie;
    }

    /**
     * Set nomcategorie
     *
     * @param string $nomcategorie
     *
     * @return Categorie
     */
    public function setNomcategorie($nomcategorie)
    {
        $this->nomcategorie = $nomcategorie;

        return $this;
    }

    /**
     * Get nomcategorie
     *
     * @return string
     */
    public function getNomcategorie()
    {
        return $this->nomcategorie;
    }

    /**
     * Add iditem
     *
     * @param \Lambda\LambdaBundle\Entity\Item $iditem
     *
     * @return Categorie
     */
    public function addIditem(\Lambda\LambdaBundle\Entity\Item $iditem)
    {
        $this->iditem[] = $iditem;

        return $this;
    }

    /**
     * Remove iditem
     *
     * @param \Lambda\LambdaBundle\Entity\Item $iditem
     */
    public function removeIditem(\Lambda\LambdaBundle\Entity\Item $iditem)
    {
        $this->iditem->removeElement($iditem);
    }

    /**
     * Get iditem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIditem()
    {
        return $this->iditem;
    }

    /**
     * Add idpropriete
     *
     * @param \Lambda\LambdaBundle\Entity\Lienpropriete $idpropriete
     *
     * @return Categorie
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

    /**
     * Add idsouscategorie
     *
     * @param \Lambda\LambdaBundle\Entity\Souscategorie $idsouscategorie
     *
     * @return Categorie
     */
    public function addIdsouscategorie(\Lambda\LambdaBundle\Entity\Souscategorie $idsouscategorie)
    {
        $this->idsouscategorie[] = $idsouscategorie;

        return $this;
    }

    /**
     * Remove idsouscategorie
     *
     * @param \Lambda\LambdaBundle\Entity\Souscategorie $idsouscategorie
     */
    public function removeIdsouscategorie(\Lambda\LambdaBundle\Entity\Souscategorie $idsouscategorie)
    {
        $this->idsouscategorie->removeElement($idsouscategorie);
    }

    /**
     * Get idsouscategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdsouscategorie()
    {
        return $this->idsouscategorie;
    }
}
