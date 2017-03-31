<?php

namespace Lambda\LambdaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
// DON'T forget this use statement!!!
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * User
 * @ORM\Entity(repositoryClass="Lambda\LambdaBundle\Repository\UserRepository")
 * @ORM\Table(name="user")
 * @UniqueEntity(fields={"username", "email"}, message="ceci est deja utilisé !!!")
 * 
 */
class User implements UserInterface, \Serializable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=180, nullable=false)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="username_canonical", type="string", length=180, nullable=false)
     */
    private $usernameCanonical;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=180, nullable=false)
     * 
     */
    private $email;

    /**
     * @var string
     * @Assert\Length(min = 6,
     * minMessage="Votre mot de passe doit avoir une longueur d'au moins 6 caractères !!!")
     * @ORM\Column(name="email_canonical", type="string", length=180, nullable=false)
     */
    private $emailCanonical;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled;

    
    
    /**
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;
    
    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="plainpassword", type="string", length=255, nullable=false)
     */
    private $plainpassword;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="mdepuis", type="datetime", nullable=false)
     */
    private $mdepuis;

    /**
     * @var integer
     *
     * @ORM\Column(name="telephone", type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="genre", type="boolean", nullable=true)
     */
    private $genre;
    
    /**
    * @ORM\Column(type="json_array")
    */
    private $roles = array();

    /**
     * @var \Doctrine\Common\Collections\Collection
     * inverse side
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Adresse", mappedBy="users")
     *
     */
    private $adresses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * inverse side
     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Groupe", mappedBy="users")
     * 
     */
    private $groupes;
    
//    @ORM\JoinTable(name="appartientgroupe",
//     *   joinColumns={
//     *     @ORM\JoinColumn(name="idusergroupe", referencedColumnName="id")
//     *   },
//     *   inverseJoinColumns={
//     *     @ORM\JoinColumn(name="idgroupelien", referencedColumnName="idgroupe")
//     *   }
//     * )

 //   /**
 //    * @var \Doctrine\Common\Collections\Collection
//     *
//     * @ORM\ManyToMany(targetEntity="Lambda\LambdaBundle\Entity\Groupe", inversedBy="iduser")
//     * @ORM\JoinTable(name="liengroupe",
//    *   joinColumns={
//     *     @ORM\JoinColumn(name="idUser", referencedColumnName="id")
//     *   },
//     *   inverseJoinColumns={
//     *     @ORM\JoinColumn(name="idGroupe", referencedColumnName="idGroupe")
//     *   }
 //    * )
//     */
    //private $idgroupe;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        //$this->idgroupelien = new \Doctrine\Common\Collections\ArrayCollection();
        $this->groupes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->isActive = true;
        $this->enabled = true;
        $this->mdepuis = new \Datetime;
        $this->roles[] = 'ROLE_USER';
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set usernameCanonical
     *
     * @param string $usernameCanonical
     *
     * @return User
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;

        return $this;
    }

    /**
     * Get usernameCanonical
     *
     * @return string
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set emailCanonical
     *
     * @param string $emailCanonical
     *
     * @return User
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;

        return $this;
    }

    /**
     * Get emailCanonical
     *
     * @return string
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     *
     * @return User
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set plainpassword
     *
     * @param string $plainpassword
     *
     * @return User
     */
    public function setPlainpassword($plainpassword)
    {
        $this->plainpassword = $plainpassword;

        return $this;
    }

    /**
     * Get plainpassword
     *
     * @return string
     */
    public function getPlainpassword()
    {
        return $this->plainpassword;
    }

    /**
     * Set mdepuis
     *
     * @param \DateTime $mdepuis
     *
     * @return User
     */
    public function setMdepuis($mdepuis)
    {
        $this->mdepuis = $mdepuis;

        return $this;
    }

    /**
     * Get mdepuis
     *
     * @return \DateTime
     */
    public function getMdepuis()
    {
        return $this->mdepuis;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     *
     * @return User
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set genre
     *
     * @param boolean $genre
     *
     * @return User
     */
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return boolean
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Add idadresse
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $idadresse
     *
     * @return User
     */
    public function addIdadresse(\Lambda\LambdaBundle\Entity\Adresse $idadresse)
    {
        $this->idadresse[] = $idadresse;

        return $this;
    }

    /**
     * Remove idadresse
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $idadresse
     */
    public function removeIdadresse(\Lambda\LambdaBundle\Entity\Adresse $idadresse)
    {
        $this->idadresse->removeElement($idadresse);
    }

    /**
     * Get idadresse
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdadresse()
    {
        return $this->idadresse;
    }

    /**
     * Add idgroupelien
     *
     * @param \Lambda\LambdaBundle\Entity\Groupe $idgroupelien
     *
     * @return User
     */
    public function addIdgroupelien(\Lambda\LambdaBundle\Entity\Groupe $idgroupelien)
    {
        $this->idgroupelien[] = $idgroupelien;

        return $this;
    }

    /**
     * Remove idgroupelien
     *
     * @param \Lambda\LambdaBundle\Entity\Groupe $idgroupelien
     */
    public function removeIdgroupelien(\Lambda\LambdaBundle\Entity\Groupe $idgroupelien)
    {
        $this->idgroupelien->removeElement($idgroupelien);
    }

    /**
     * Get idgroupelien
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdgroupelien()
    {
        return $this->idgroupelien;
    }

    /**
     * Add idgroupe
     *
     * @param \Lambda\LambdaBundle\Entity\Groupe $idgroupe
     *
     * @return User
     */
    public function addIdgroupe(\Lambda\LambdaBundle\Entity\Groupe $idgroupe)
    {
        $this->idgroupe[] = $idgroupe;

        return $this;
    }

    /**
     * Remove idgroupe
     *
     * @param \Lambda\LambdaBundle\Entity\Groupe $idgroupe
     */
    public function removeIdgroupe(\Lambda\LambdaBundle\Entity\Groupe $idgroupe)
    {
        $this->idgroupe->removeElement($idgroupe);
    }

    /**
     * Get idgroupe
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }
    
       /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        return $this->roles;
    }

    public function getSalt() {
        return null;
    }
    
    public function setRoles(array $roles) {
        return $this->roles = $roles;
    }



    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add groupe
     *
     * @param \Lambda\LambdaBundle\Entity\Groupe $groupe
     *
     * @return User
     */
    public function addGroupe(\Lambda\LambdaBundle\Entity\Groupe $groupe)
    {
        $this->groupes[] = $groupe;

        return $this;
    }

    /**
     * Remove groupe
     *
     * @param \Lambda\LambdaBundle\Entity\Groupe $groupe
     */
    public function removeGroupe(\Lambda\LambdaBundle\Entity\Groupe $groupe)
    {
        $this->groupes->removeElement($groupe);
    }

    /**
     * Get groupes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    /**
     * Add adress
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $adress
     *
     * @return User
     */
    public function addAdress(\Lambda\LambdaBundle\Entity\Adresse $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \Lambda\LambdaBundle\Entity\Adresse $adress
     */
    public function removeAdress(\Lambda\LambdaBundle\Entity\Adresse $adress)
    {
        $this->adresses->removeElement($adress);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses()
    {
        return $this->adresses;
    }
}
