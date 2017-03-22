<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produitpropriete
 *
 * @ORM\Table(name="produitpropriete")
 * @ORM\Entity(repositoryClass="Lambda\LambdaBundle\Repository\ProduitproprieteRepository")
 */
class Produitpropriete
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idproduit", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idproduit;

    /**
     * @var integer
     *
     * @ORM\Column(name="idpropriete", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idpropriete;

    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="text", length=65535, nullable=false)
     */
    private $valeur;



    /**
     * Set idproduit
     *
     * @param integer $idproduit
     *
     * @return Produitpropriete
     */
    public function setIdproduit($idproduit)
    {
        $this->idproduit = $idproduit;

        return $this;
    }

    /**
     * Get idproduit
     *
     * @return integer
     */
    public function getIdproduit()
    {
        return $this->idproduit;
    }

    /**
     * Set idpropriete
     *
     * @param integer $idpropriete
     *
     * @return Produitpropriete
     */
    public function setIdpropriete($idpropriete)
    {
        $this->idpropriete = $idpropriete;

        return $this;
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
     * Set valeur
     *
     * @param string $valeur
     *
     * @return Produitpropriete
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
}
