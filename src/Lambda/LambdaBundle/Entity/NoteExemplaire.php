<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lambda\LambdaBundle\Entity\Exemplairecommentaire;
/**
 * Note
 *
 * @ORM\Table(name="noteexemplaire", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CFBDFA1427AD97C4", columns={"idCommentaire"})})
 * @ORM\Entity
 */
class NoteExemplaire extends Exemplairecommentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="note", type="integer", nullable=false)
     */
    protected $note;
    
    public function __construct()
    {
        parent::__construct();
    }

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
     * Set idexcommente
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $idexcommente
     *
     * @return NoteExemplaire
     */
    public function setIdexcommente(\Lambda\LambdaBundle\Entity\Exemplaire $idexcommente = null)
    {
        $this->idexcommente = $idexcommente;

        return $this;
    }

    /**
     * Get idexcommente
     *
     * @return \Lambda\LambdaBundle\Entity\Exemplaire
     */
    public function getIdexcommente()
    {
        return $this->idexcommente;
    }
}
