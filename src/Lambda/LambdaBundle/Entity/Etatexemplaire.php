<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etatexemplaire
 *
 * @ORM\Table(name="etatexemplaire", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_E3F6DB63DC0C2278", columns={"idExemplaire"})}, indexes={@ORM\Index(name="fk_etatexemplaire", columns={"idExemplaire"})})
 * @ORM\Entity
 */
class Etatexemplaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=220)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $etat;

    /**
     * @var \Lambda\LambdaBundle\Entity\Exemplaire
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Exemplaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idExemplaire", referencedColumnName="idexemplaire")
     * })
     */
    private $idexemplaire;



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
