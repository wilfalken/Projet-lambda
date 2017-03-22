<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typemessage
 *
 * @ORM\Table(name="typemessage", indexes={@ORM\Index(name="IDX_6C59BCC4A6045B8D", columns={"idMessage"})})
 * @ORM\Entity
 */
class Typemessage
{
    /**
     * @var string
     *
     * @ORM\Column(name="typeMessage", type="string", length=50)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $typemessage;

    /**
     * @var \Lambda\LambdaBundle\Entity\Message
     *
     * @ORM\OneToOne(targetEntity="Lambda\LambdaBundle\Entity\Message")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMessage", referencedColumnName="idMessage", unique=true)
     * })
     */
    private $idmessage;



    /**
     * Set typemessage
     *
     * @param string $typemessage
     *
     * @return Typemessage
     */
    public function setTypemessage($typemessage)
    {
        $this->typemessage = $typemessage;

        return $this;
    }

    /**
     * Get typemessage
     *
     * @return string
     */
    public function getTypemessage()
    {
        return $this->typemessage;
    }

    /**
     * Set idmessage
     *
     * @param \Lambda\LambdaBundle\Entity\Message $idmessage
     *
     * @return Typemessage
     */
    public function setIdmessage(\Lambda\LambdaBundle\Entity\Message $idmessage = null)
    {
        $this->idmessage = $idmessage;

        return $this;
    }

    /**
     * Get idmessage
     *
     * @return \Lambda\LambdaBundle\Entity\Message
     */
    public function getIdmessage()
    {
        return $this->idmessage;
    }
}
