<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LikeProductRepository")
 */
class LikeProduct
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
    private $productLike;

    /**
     * @ORM\Column(type="integer")
     */
    private $userId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductLike(): ?Product
    {
        return $this->productLike;
    }

    public function setProductLike(?Product $productLike): self
    {
        $this->productLike = $productLike;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
