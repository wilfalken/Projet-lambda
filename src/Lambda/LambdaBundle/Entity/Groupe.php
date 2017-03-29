<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *
 * @ORM\Table(name="groupe")
 * @ORM\Entity(repositoryClass="Lambda\LambdaBundle\Repository\GroupeRepository")
 */
class Groupe
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idGroupe", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="nomGroupe", type="string", length=50, nullable=false)
     */
    private $nomgroupe;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\User", mappedBy="idgroupelien")
     */
    private $idusergroupe;

    /**
     * @var integer
     *
     * @ORM\Column(name="officier", type="integer")
     */
    private $officier;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idusergroupe = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->iduser = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idgroupe
     *
     * @return integer
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }

    /**
     * Set nomgroupe
     *
     * @param string $nomgroupe
     *
     * @return Groupe
     */
    public function setNomgroupe($nomgroupe)
    {
        $this->nomgroupe = $nomgroupe;

        return $this;
    }

    /**
     * Get nomgroupe
     *
     * @return string
     */
    public function getNomgroupe()
    {
        return $this->nomgroupe;
    }

    /**
     * Add idusergroupe
     *
     * @param \Lambda\LambdaBundle\Entity\User $idusergroupe
     *
     * @return Groupe
     */
    public function addIdusergroupe(\Lambda\LambdaBundle\Entity\User $idusergroupe)
    {
        $this->idusergroupe[] = $idusergroupe;

        return $this;
    }

    /**
     * Remove idusergroupe
     *
     * @param \Lambda\LambdaBundle\Entity\User $idusergroupe
     */
    public function removeIdusergroupe(\Lambda\LambdaBundle\Entity\User $idusergroupe)
    {
        $this->idusergroupe->removeElement($idusergroupe);
    }

    /**
     * Get idusergroupe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdusergroupe()
    {
        return $this->idusergroupe;
    }

//    /**
//     * Add iduser
//     *
//     * @param \Lambda\LambdaBundle\Entity\User $iduser
//     *
//     * @return Groupe
//     */
//    public function addIduser(\Lambda\LambdaBundle\Entity\User $iduser)
//    {
//        $this->iduser[] = $iduser;
//
//        return $this;
//    }

//    /**
//     * Remove iduser
//     *
//     * @param \Lambda\LambdaBundle\Entity\User $iduser
//     */
//    public function removeIduser(\Lambda\LambdaBundle\Entity\User $iduser)
//    {
//        $this->iduser->removeElement($iduser);
//    }

    /**
     * Set officier
     *
     * @param integer $officier
     *
     * @return Groupe
     */
    public function setOfficier($officier)
    {
        $this->officier = $officier;

        return $this;
    }

    /**
     * Get officier
     *
     * @return integer
     */
    public function getOfficier()
    {
        return $this->officier;
    }
}
