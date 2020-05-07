<?php

namespace App\Entity;


use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;
use Webmozart\Assert\Assert as AssertAssert;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

  
    private $same_password;


    /**
     * @ORM\Column(type="datetime")
     */
    private $date_create;

 
    private $salt;


    private $roles = array();



    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('username', new NotBlank([
            'message' => 'Le champ est vide',
            
        ]));

        $metadata->addPropertyConstraint('username', new Assert\Length([
            'min' => 2,
            'max' => 10,
            'minMessage' => 'Champ trop court',
            'maxMessage' => 'Champ trop long',
            'allowEmptyString' => false,
        ]));

        $metadata->addPropertyConstraint('username', new Assert\Regex([
            'pattern' => '/^[a-zA-Z]+$/',
            'message' => "Champ incorrect"
        ]));

        $metadata->addPropertyConstraint('name', new NotBlank([
            'message' => 'Le champ est vide',
        ]));

        $metadata->addPropertyConstraint('name', new Assert\Length([
            'min' => 2,
            'max' => 10,
            'minMessage' => 'Champ trop court',
            'maxMessage' => 'Champ trop long',
            'allowEmptyString' => false,
        ]));

        $metadata->addPropertyConstraint('name', new Assert\Regex([
            'pattern' => '/^[a-zA-Z]+$/',
            'message' => "Champ incorrect"
        ]));

        $metadata->addPropertyConstraint('email', new NotBlank([
            'message' => 'Le champ est vide',
        ]));

        $metadata->addPropertyConstraint('email', new Assert\Email([
            'message' => 'L\'email n\'est pas valide',
        ]));

        $metadata->addPropertyConstraint('password', new NotBlank([
            'message' => 'Le champ est vide',
        ]));

        $metadata->addPropertyConstraint('same_password', new NotBlank([
            'message' => 'Le champ est vide',
        ]));

      

    }

    
    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    
     /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Accounts
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
 
        return $this;
    }

     /**
     * Set roles
     *
     * @param array $roles
     *
     * @return Accounts
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
 
        return $this;
    }
 
    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        $this->roles = ['ROLE_USER'];
        
        return $this->roles;
    }
 
    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSamePassword(): ?string
    {
        return $this->same_password;
    }

    public function setSamePassword(string $password): self
    {
        $this->same_password = $password;

        return $this;
    }


    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->date_create;
    }

    public function setDateCreate(\DateTimeInterface $date_create): self
    {
        $this->date_create = $date_create;

        return $this;
    }

 

}
