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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Categorie", mappedBy="idpropriete")
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
}
