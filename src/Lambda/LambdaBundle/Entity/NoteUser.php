<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Lambda\LambdaBundle\Entity\Usercommentaire;
/**
 * Note
 *
 * @ORM\Table(name="noteuser", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_CFBDFA1427AD97C4", columns={"idCommentaire"})})
 * @ORM\Entity
 */
class NoteUser extends Usercommentaire
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
     * Set idusercommente
     *
     * @param \Lambda\LambdaBundle\Entity\User $idusercommente
     *
     * @return NoteUser
     */
    public function setIdusercommente(\Lambda\LambdaBundle\Entity\User $idusercommente = null)
    {
        $this->idusercommente = $idusercommente;

        return $this;
    }

    /**
     * Get idusercommente
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIdusercommente()
    {
        return $this->idusercommente;
    }
}
