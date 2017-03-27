<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typecommentaire
 *
 * @ORM\Table(name="typecommentaire", indexes={@ORM\Index(name="fk_commentairetype", columns={"idCommentaire"})})
 * @ORM\Entity
 */
class Typecommentaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $description;

    /**
     * @var \Lambda\LambdaBundle\Entity\Commentaire
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\Commentaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommentaire", referencedColumnName="idCommentaire")
     * })
     */
    private $idcommentaire;



    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set idcommentaire
     *
     * @param \Lambda\LambdaBundle\Entity\Commentaire $idcommentaire
     *
     * @return Typecommentaire
     */
    public function setIdcommentaire(\Lambda\LambdaBundle\Entity\Commentaire $idcommentaire = null)
    {
        $this->idcommentaire = $idcommentaire;

        return $this;
    }

    /**
     * Get idcommentaire
     *
     * @return \Lambda\LambdaBundle\Entity\Commentaire
     */
    public function getIdcommentaire()
    {
        return $this->idcommentaire;
    }
}
