<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Note
 *
 * @ORM\Table(name="note", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CFBDFA1427AD97C4", columns={"idCommentaire"})})
 * @ORM\Entity
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    private $note;

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
     * Set note
     *
     * @param integer $note
     *
     * @return Note
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set idcommentaire
     *
     * @param \Lambda\LambdaBundle\Entity\Commentaire $idcommentaire
     *
     * @return Note
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
