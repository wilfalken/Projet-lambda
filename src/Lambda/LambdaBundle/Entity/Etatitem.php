<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etatitem
 *
 * @ORM\Table(name="etatitem", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_14ABE57C6CE67B80", columns={"idItem"})}, indexes={@ORM\Index(name="IDX_14ABE57C6CE67B80", columns={"idItem"})})
 * @ORM\Entity
 */
class Etatitem
{
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(name="etatInitial", type="string", length=220)
     * 
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $etatinitial;

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
     * Get etatinitial
     *
     * @return string
     */
    public function getEtatinitial()
    {
        return $this->etatinitial;
    }

    /**
     * Set iditem
     *
     * @param \Lambda\LambdaBundle\Entity\Item $iditem
     *
     * @return Etatitem
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
