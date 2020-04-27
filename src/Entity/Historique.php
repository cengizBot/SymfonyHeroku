<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HistoriqueRepository")
 */
class Historique
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $number_article;

    /**
     * @ORM\Column(type="integer")
     */
    private $couts_totaux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reference_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $TTC;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_buy;

    public function __construct()
    {
        $this->product = new ArrayCollection();
        $this->user = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->product->contains($product)) {
            $this->product[] = $product;
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->product->contains($product)) {
            $this->product->removeElement($product);
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->user->contains($user)) {
            $this->user->removeElement($user);
        }

        return $this;
    }

    public function getNumberArticle(): ?int
    {
        return $this->number_article;
    }

    public function setNumberArticle(int $number_article): self
    {
        $this->number_article = $number_article;

        return $this;
    }

    public function getCoutsTotaux(): ?int
    {
        return $this->couts_totaux;
    }

    public function setCoutsTotaux(int $couts_totaux): self
    {
        $this->couts_totaux = $couts_totaux;

        return $this;
    }

    public function getReferenceId(): ?string
    {
        return $this->reference_id;
    }

    public function setReferenceId(string $reference_id): self
    {
        $this->reference_id = $reference_id;

        return $this;
    }

    public function getTTC(): ?int
    {
        return $this->TTC;
    }

    public function setTTC(int $TTC): self
    {
        $this->TTC = $TTC;

        return $this;
    }

    public function getDateBuy(): ?\DateTimeInterface
    {
        return $this->date_buy;
    }

    public function setDateBuy(\DateTimeInterface $date_buy): self
    {
        $this->date_buy = $date_buy;

        return $this;
    }
}
