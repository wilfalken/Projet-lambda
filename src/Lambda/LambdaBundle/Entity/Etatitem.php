<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etatitem
 *
 * @ORM\Table(name="etatitem", indexes={@ORM\Index(name="IDX_14ABE57C6CE67B80", columns={"idItem"})})
 * @ORM\Entity
 */
class Etatitem
{
    /**
     * @var string
     *
     * @ORM\Column(name="etatInitial", type="string", length=400)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $etatinitial;

    /**
     * @var \Lambda\LambdaBundle\Entity\Item
     *
     * @ORM\OneToOne(targetEntity="Lambda\LambdaBundle\Entity\Item")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idItem", referencedColumnName="idItem", unique=true)
     * })
     */
    private $iditem;



    /**
     * Set etatinitial
     *
     * @param string $etatinitial
     *
     * @return Etatitem
     */
    public function setEtatinitial($etatinitial)
    {
        $this->etatinitial = $etatinitial;

        return $this;
    }

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
