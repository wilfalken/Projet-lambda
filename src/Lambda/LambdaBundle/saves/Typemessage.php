<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typemessage
 *
 * @ORM\Table(name="typemessage", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_6C59BCC4A6045B8D", columns={"idMessage"})}, indexes={@ORM\Index(name="IDX_6C59BCC4A6045B8D", columns={"idMessage"})})
 * @ORM\Entity
 */
class Typemessage
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="typeMessage", type="string", length=50)
     * 
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $typemessage;

    /**
     * @var \Lambda\LambdaBundle\Entity\Message
     * 
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Message")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMessage", referencedColumnName="idMessage")
     * })
     */
    private $idmessage;



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
