<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Url
 *
 * @ORM\Table(name="url", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_F47645AE6CE67B80", columns={"idItem"})}, indexes={@ORM\Index(name="fk_itemurl", columns={"idItem"})})
 * @ORM\Entity
 */
class Url
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=100)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $url;

    /**
     * @var \Lambda\LambdaBundle\Entity\Item
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="idItem")
     * })
     */
    private $iditem;



    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set iditem
     *
     * @param \Lambda\LambdaBundle\Entity\Item $iditem
     *
     * @return Url
     */
    public function setIditem(\Lambda\LambdaBundle\Entity\Item $iditem = null)
    {
        $this->iditem = $iditem;

        return $this;
    }

    /**
     * Get iditem
     *
     * @return \Lambda\LambdaBundle\Entity\Item
     */
    public function getIditem()
    {
        return $this->iditem;
    }
}
