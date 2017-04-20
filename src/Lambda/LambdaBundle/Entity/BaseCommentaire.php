<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 * @ORM\MappedSuperclass
 *                //@ORM\Table(name="basecommentaire")
 *                 //@ORM\Entity
 */
abstract class BaseCommentaire
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCommentaire", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $idcommentaire;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateAjout", type="datetime", nullable=false)
     */
    protected $dateajout;

//    /**
//     * @var string
//     *
//     * @ORM\Column(name="idType", type="integer", nullable=false)
//     */
//    private $type;
//
//    /**
//     * @var string
//     *
//     * @ORM\Column(name="entite", type="string", length=20, nullable=false)
//     */
//    private $entite;
//
//    /**
//     * @var \Lambda\LambdaBundle\Entity\User
//     *
//     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="idCommente", referencedColumnName="id")
//     * })
//     */
//    private $idcommente;

    /**
     * @var \Lambda\LambdaBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Lambda\LambdaBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUser", referencedColumnName="id")
     * })
     */
    protected $iduser;

    public function __construct()
    {
        $this->dateajout = new \Datetime;
    }

    /**
     * Get idcommentaire
     *
     * @return integer
     */
    public function getIdcommentaire()
    {
        return $this->idcommentaire;
    }

    /**
     * Set dateajout
     *
     * @param \DateTime $dateajout
     *
     * @return Commentaire
     */
    public function setDateajout($dateajout)
    {
        $this->dateajout = $dateajout;

        return $this;
    }

    /**
     * Get dateajout
     *
     * @return \DateTime
     */
    public function getDateajout()
    {
        return $this->dateajout;
    }
    
    

//    /**
//     * Set idtype
//     *
//     * @param integer $idtype
//     *
//     * @return Commentaire
//     */
//    public function setIdtype($idtype)
//    {
//        $this->idtype = $idtype;
//
//        return $this;
//    }
//
//    /**
//     * Get idtype
//     *
//     * @return integer
//     */
//    public function getIdtype()
//    {
//        return $this->idtype;
//    }
//
//    /**
//     * Set entite
//     *
//     * @param string $entite
//     *
//     * @return Commentaire
//     */
//    public function setEntite($entite)
//    {
//        $this->entite = $entite;
//
//        return $this;
//    }
//
//    /**
//     * Get entite
//     *
//     * @return string
//     */
//    public function getEntite()
//    {
//        return $this->entite;
//    }
//
//    /**
//     * Set idcommente
//     *
//     * @param \Lambda\LambdaBundle\Entity\User $idcommente
//     *
//     * @return Commentaire
//     */
//    public function setIdcommente(\Lambda\LambdaBundle\Entity\User $idcommente = null)
//    {
//        $this->idcommente = $idcommente;
//
//        return $this;
//    }
//
//    /**
//     * Get idcommente
//     *
//     * @return \Lambda\LambdaBundle\Entity\User
//     */
//    public function getIdcommente()
//    {
//        return $this->idcommente;
//    }

    /**
     * Set iduser
     *
     * @param \Lambda\LambdaBundle\Entity\User $iduser
     *
     * @return Commentaire
     */
    public function setIduser(\Lambda\LambdaBundle\Entity\User $iduser = null)
    {
        $this->iduser = $iduser;

        return $this;
    }

    /**
     * Get iduser
     *
     * @return \Lambda\LambdaBundle\Entity\User
     */
    public function getIduser()
    {
        return $this->iduser;
    }
}
