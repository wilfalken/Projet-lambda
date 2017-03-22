<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rdv
 *
 * @ORM\Table(name="rdv", indexes={@ORM\Index(name="fk_rdvadresse", columns={"idAdresseUser"})})
 * @ORM\Entity
 */
class Rdv
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRDV", type="datetime", nullable=false)
     */
    private $daterdv;

    /**
     * @var \Lambda\LambdaBundle\Entity\Emprunt
     *
     * @ORM\OneToOne(targetEntity="Lambda\LambdaBundle\Entity\Emprunt")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEmprunt", referencedColumnName="idEmprunt", unique=true)
     * })
     */
    private $idemprunt;

    /**
     * @var \Lambda\LambdaBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAdresseUser", referencedColumnName="idadresse")
     * })
     */
    private $idadresseuser;



    /**
     * Set daterdv
     *
     * @param \DateTime $daterdv
     *
     * @return Rdv
     */
    public function setDaterdv($daterdv)
    {
        $this->daterdv = $daterdv;

        return $this;
    }

    /**
     * Get daterdv
     *
     * @return \DateTime
     */
    public function getDaterdv()
    {
        return $this->daterdv;
    }

    /**
     * Set idemprunt
     *
     * @param \Lambda\LambdaBundle\Entity\Emprunt $idemprunt
     *
     * @return Rdv
     */
    public function setIdemprunt(\Lambda\LambdaBundle\Entity\Emprunt $idemprunt = null)
    {
        $this->idemprunt = $idemprunt;

        return $this;
    }

    /**
     * Get idemprunt
     *
     * @return \Lambda\LambdaBundle\Entity\Emprunt
     */
    public function getIdemprunt()
    {
        return $this->idemprunt;
    }

    /**
     * Set idadresseuser
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $idadresseuser
     *
     * @return Rdv
     */
    public function setIdadresseuser(\Lambda\LambdaBundle\Entity\Adresse $idadresseuser = null)
    {
        $this->idadresseuser = $idadresseuser;

        return $this;
    }

    /**
     * Get idadresseuser
     *
     * @return \Lambda\LambdaBundle\Entity\Adresse
     */
    public function getIdadresseuser()
    {
        return $this->idadresseuser;
    }
}
