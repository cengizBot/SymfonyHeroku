<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PayementRepository")
 */
class Payement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Historique")
     */
    private $historique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $cp;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $addr;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_card;

    /**
     * @ORM\Column(type="integer")
     */
    private $expirM;

    /**
     * @ORM\Column(type="integer")
     */
    private $expirY;

    /**
     * @ORM\Column(type="integer")
     */
    private $crypto;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHistorique(): ?Historique
    {
        return $this->historique;
    }

    public function setHistorique(?Historique $historique): self
    {
        $this->historique = $historique;

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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCp(): ?int
    {
        return $this->cp;
    }

    public function setCp(int $cp): self
    {
        $this->cp = $cp;

        return $this;
    }

    public function getAddr(): ?string
    {
        return $this->addr;
    }

    public function setAddr(string $addr): self
    {
        $this->addr = $addr;

        return $this;
    }

    public function getNumberCard(): ?int
    {
        return $this->number_card;
    }

    public function setNumberCard(int $number_card): self
    {
        $this->number_card = $number_card;

        return $this;
    }

    public function getExpirM(): ?int
    {
        return $this->expirM;
    }

    public function setExpirM(int $expirM): self
    {
        $this->expirM = $expirM;

        return $this;
    }

    public function getExpirY(): ?int
    {
        return $this->expirY;
    }

    public function setExpirY(int $expirY): self
    {
        $this->expirY = $expirY;

        return $this;
    }

    public function getCrypto(): ?int
    {
        return $this->crypto;
    }

    public function setCrypto(int $crypto): self
    {
        $this->crypto = $crypto;

        return $this;
    }
}
