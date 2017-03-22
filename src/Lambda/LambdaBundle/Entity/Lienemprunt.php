<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lienemprunt
 *
 * @ORM\Table(name="lienemprunt", indexes={@ORM\Index(name="fk_emprunteur", columns={"idEmprunteur"}), @ORM\Index(name="fk_loueur", columns={"idProprietaire"})})
 * @ORM\Entity
 */
class Lienemprunt
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEmprunt", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idemprunt;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEmprunteur", referencedColumnName="id")
     * })
     */
    private $idemprunteur;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idProprietaire", referencedColumnName="id")
     * })
     */
    private $idproprietaire;



    /**
     * Get idemprunt
     *
     * @return integer
     */
    public function getIdemprunt()
    {
        return $this->idemprunt;
    }

    /**
     * Set idemprunteur
     *
     * @param \Lambda\LambdaBundle\Entity\User $idemprunteur
     *
     * @return Lienemprunt
     */
    public function setIdemprunteur(\Lambda\LambdaBundle\Entity\User $idemprunteur = null)
    {
        $this->idemprunteur = $idemprunteur;

        return $this;
    }

    /**
     * Get idemprunteur
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIdemprunteur()
    {
        return $this->idemprunteur;
    }

    /**
     * Set idproprietaire
     *
     * @param \Lambda\LambdaBundle\Entity\User $idproprietaire
     *
     * @return Lienemprunt
     */
    public function setIdproprietaire(\Lambda\LambdaBundle\Entity\User $idproprietaire = null)
    {
        $this->idproprietaire = $idproprietaire;

        return $this;
    }

    /**
     * Get idproprietaire
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIdproprietaire()
    {
        return $this->idproprietaire;
    }
}
