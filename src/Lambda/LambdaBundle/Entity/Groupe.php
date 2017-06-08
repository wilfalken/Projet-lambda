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
     * Owning side
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\User", inversedBy="groupes")
     * @ORM\JoinTable(name="appartientgroupe",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idgroupelien", referencedColumnName="idGroupe")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idusergroupe", referencedColumnName="id")
     *   }
     * )
     */
    private $users;

    /**
     * @var array
     *
     * @ORM\Column(name="officier", type="json_array")
     */
    private $officiers=array();

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=250, nullable=false)
     */
    private $description;
    
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idusergroupe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->officiers = array();
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
//
//    /**
//     * Set officier
//     *
//     * @param integer $officier
//     *
//     * @return Groupe
//     */
//    public function setOfficier($officier)
//    {
//        $this->officier = $officier;
//
//        return $this;
//    }
//
//    /**
//     * Get officier
//     *
//     * @return integer
//     */
//    public function getOfficier()
//    {
//        return $this->officier;
//    }

    /**
     * Add user
     *
     * @param \Lambda\LambdaBundle\Entity\User $user
     *
     * @return Groupe
     */
    public function addUser(\Lambda\LambdaBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Lambda\LambdaBundle\Entity\User $user
     */
    public function removeUser(\Lambda\LambdaBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set officiers
     *
     * @param array $officiers
     *
     * @return Groupe
     */
    public function setOfficiers(array $officiers)
    {
        $this->officiers = $officiers;

        return $this;
    }
    
     /**
     * Add officiers
     *
     * @return array
     */
    public function addOfficier(\Lambda\LambdaBundle\Entity\User $user)
    {
        $this->officiers[] = $user->getUsername();
        return $this;
    }

    /**
     * Get officiers
     *
     * @return array
     */
    public function getOfficiers()
    {
        return $this->officiers;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Groupe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
