<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etatexemplaire
 *
 * @ORM\Table(name="etatexemplaire", indexes={@ORM\Index(name="fk_etatexemplaire", columns={"idExemplaire"})})
 * @ORM\Entity
 */
class Etatexemplaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=400)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $etat;

    /**
     * @var \Lambda\LambdaBundle\Entity\Exemplaire
     *
     * @ORM\OneToOne(targetEntity="Lambda\LambdaBundle\Entity\Exemplaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idExemplaire", referencedColumnName="idexemplaire", unique=true)
     * })
     */
    private $idexemplaire;



    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Etatexemplaire
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set idexemplaire
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $idexemplaire
     *
     * @return Etatexemplaire
     */
    public function setIdexemplaire(\Lambda\LambdaBundle\Entity\Exemplaire $idexemplaire = null)
    {
        $this->idexemplaire = $idexemplaire;

        return $this;
    }

    /**
     * Get idexemplaire
     *
     * @return \Lambda\LambdaBundle\Entity\Exemplaire
     */
    public function getIdexemplaire()
    {
        return $this->idexemplaire;
    }
}
