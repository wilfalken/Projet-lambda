<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Textecommentaire
 *
 * @ORM\Table(name="textecommentaire", indexes={@ORM\Index(name="IDX_89A8368A27AD97C4", columns={"idCommentaire"})})
 * @ORM\Entity
 */
class Textecommentaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="texteCommentaire", type="string", length=400)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $textecommentaire;

    /**
     * @var \Lambda\LambdaBundle\Entity\Commentaire
     *
     * @ORM\OneToOne(targetEntity="Lambda\LambdaBundle\Entity\Commentaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCommentaire", referencedColumnName="idCommentaire", unique=true)
     * })
     */
    private $idcommentaire;



    /**
     * Set textecommentaire
     *
     * @param string $textecommentaire
     *
     * @return Textecommentaire
     */
    public function setTextecommentaire($textecommentaire)
    {
        $this->textecommentaire = $textecommentaire;

        return $this;
    }

    /**
     * Get textecommentaire
     *
     * @return string
     */
    public function getTextecommentaire()
    {
        return $this->textecommentaire;
    }

    /**
     * Set idcommentaire
     *
     * @param \Lambda\LambdaBundle\Entity\Commentaire $idcommentaire
     *
     * @return Textecommentaire
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
