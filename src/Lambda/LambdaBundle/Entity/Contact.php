<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact", indexes={@ORM\Index(name="fk_idcontact", columns={"idcontact"}), @ORM\Index(name="fk_auncontact", columns={"iduser"})})
 * @ORM\Entity
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idrelation", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idrelation;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="iduser", referencedColumnName="id")
     * })
     */
    private $iduser;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idcontact", referencedColumnName="id")
     * })
     */
    private $idcontact;



    /**
     * Get idrelation
     *
     * @return integer
     */
    public function getIdrelation()
    {
        return $this->idrelation;
    }

    /**
     * Set iduser
     *
     * @param \Lambda\LambdaBundle\Entity\User $iduser
     *
     * @return Contact
     */
    public function setIduser(\Lambda\LambdaBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set idcontact
     *
     * @param \Lambda\LambdaBundle\Entity\User $idcontact
     *
     * @return Contact
     */
    public function setIdcontact(\Lambda\LambdaBundle\Entity\User $idcontact = null)
    {
        $this->idcontact = $idcontact;

        return $this;
    }

    /**
     * Get idcontact
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIdcontact()
    {
        return $this->idcontact;
    }
}
