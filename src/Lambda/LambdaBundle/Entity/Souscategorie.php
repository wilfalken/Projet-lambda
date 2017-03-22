<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souscategorie
 *
 * @ORM\Table(name="souscategorie")
 * @ORM\Entity
 */
class Souscategorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSousCategorie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idsouscategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nomSousCategorie", type="string", length=50, nullable=false)
     */
    private $nomsouscategorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Categorie", mappedBy="idsouscategorie")
     */
    private $idiscategorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idiscategorie = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idsouscategorie
     *
     * @return integer
     */
    public function getIdsouscategorie()
    {
        return $this->idsouscategorie;
    }

    /**
     * Set nomsouscategorie
     *
     * @param string $nomsouscategorie
     *
     * @return Souscategorie
     */
    public function setNomsouscategorie($nomsouscategorie)
    {
        $this->nomsouscategorie = $nomsouscategorie;

        return $this;
    }

    /**
     * Get nomsouscategorie
     *
     * @return string
     */
    public function getNomsouscategorie()
    {
        return $this->nomsouscategorie;
    }

    /**
     * Add idiscategorie
     *
     * @param \Lambda\LambdaBundle\Entity\Categorie $idiscategorie
     *
     * @return Souscategorie
     */
    public function addIdiscategorie(\Lambda\LambdaBundle\Entity\Categorie $idiscategorie)
    {
        $this->idiscategorie[] = $idiscategorie;

        return $this;
    }

    /**
     * Remove idiscategorie
     *
     * @param \Lambda\LambdaBundle\Entity\Categorie $idiscategorie
     */
    public function removeIdiscategorie(\Lambda\LambdaBundle\Entity\Categorie $idiscategorie)
    {
        $this->idiscategorie->removeElement($idiscategorie);
    }

    /**
     * Get idiscategorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdiscategorie()
    {
        return $this->idiscategorie;
    }
}
