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
    
     /**
     * @var \Doctrine\Common\Collections\Collection
     * inverse side
     * @ORM\OneToMany(targetEntity="Lambda\LambdaBundle\Entity\Exemplaire", mappedBy="user")
     * 
     */
    private $exemplaires;
    
     /**
     * @var \Doctrine\Common\Collections\Collection
     * inverse side
     * @ORM\OneToMany(targetEntity="Lambda\LambdaBundle\Entity\Emprunt", mappedBy="idproprietaire")
     * 
     */
    private $prets;
    
     /**
     * @var \Doctrine\Common\Collections\Collection
     * inverse side
     * @ORM\OneToMany(targetEntity="Lambda\LambdaBundle\Entity\Emprunt", mappedBy="idemprunteur")
     * 
     */
    private $emprunts;
    


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        $this->exemplaires = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add exemplaire
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $exemplaire
     *
     * @return User
     */
    public function addExemplaire(\Lambda\LambdaBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires[] = $exemplaire;

        return $this;
    }

    /**
     * Remove exemplaire
     *
     * @param \Lambda\LambdaBundle\Entity\Exemplaire $exemplaire
     */
    public function removeExemplaire(\Lambda\LambdaBundle\Entity\Exemplaire $exemplaire)
    {
        $this->exemplaires->removeElement($exemplaire);
    }

    /**
     * Get exemplaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExemplaires()
    {
        return $this->exemplaires;
    }

    /**
     * Add pret
     *
     * @param \Lambda\LambdaBundle\Entity\Emprunts $pret
     *
     * @return User
     */
    public function addPret(\Lambda\LambdaBundle\Entity\Emprunt $pret)
    {
        $this->prets[] = $pret;

        return $this;
    }

    /**
     * Remove pret
     *
     * @param \Lambda\LambdaBundle\Entity\Emprunts $pret
     */
    public function removePret(\Lambda\LambdaBundle\Entity\Emprunt $pret)
    {
        $this->prets->removeElement($pret);
    }

    /**
     * Get prets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrets()
    {
        return $this->prets;
    }

    /**
     * Add emprunt
     *
     * @param \Lambda\LambdaBundle\Entity\Emprunts $emprunt
     *
     * @return User
     */
    public function addEmprunt(\Lambda\LambdaBundle\Entity\Emprunt $emprunt)
    {
        $this->emprunts[] = $emprunt;

        return $this;
    }

    /**
     * Remove emprunt
     *
     * @param \Lambda\LambdaBundle\Entity\Emprunts $emprunt
     */
    public function removeEmprunt(\Lambda\LambdaBundle\Entity\Emprunt $emprunt)
    {
        $this->emprunts->removeElement($emprunt);
    }

    /**
     * Get emprunts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmprunts()
    {
        return $this->emprunts;
    }
}
