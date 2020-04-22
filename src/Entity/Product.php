<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
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
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=2000)
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $garantie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;



    public function __construct()
    {
        // $this->likes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getGarantie(): ?bool
    {
        return $this->garantie;
    }

    public function setGarantie(bool $garantie): self
    {
        $this->garantie = $garantie;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function ManagerPanier(Session $session){

        $panier = $session->get('panier');
        
        $numbers_product = 0;

        if($panier === null){
            return 0;
        }
  
        foreach ($panier as $value ) {
            
            $number = $value['count'];

            $numbers_product += $number;
        }

       return $numbers_product;
    }

    public function AddedProduct($id,$array){

        //he return the new array 
        $id = intval($id);

       for($i = 0; $i < count($array); $i ++){

            if( $id === $array[$i]['id']){
                $array[$i]['count'] += 1;
                $array[$i]['cost'] =  $array[$i]['price'] *  $array[$i]['count'];
            }

       }

        return $array;

    }

    public function RemoveProduct($id,$array){

        //he return the new array 
        $id = intval($id);

       for($i = 0; $i < count($array); $i ++){
     

            if( $id === $array[$i]['id']){
             
                $array[$i]['count'] -= 1;

                if($array[$i]['count'] < 1 ){

                   unset($array[$i]);
                   return array_values($array);
                
                }

                $array[$i]['cost'] =  $array[$i]['price'] *  $array[$i]['count'];

            
            }


       }
   

        return $array;

    }

   
    // /**
    //  * @return Collection|Like[]
    //  */
    // public function getLikes(): Collection
    // {
    //     return $this->likes;
    // }

    // public function addLike(Like $like): self
    // {
    //     if (!$this->likes->contains($like)) {
    //         $this->likes[] = $like;
    //         $like->setIdProduct($this);
    //     }

    //     return $this;
    // }

    // public function removeLike(Like $like): self
    // {
    //     if ($this->likes->contains($like)) {
    //         $this->likes->removeElement($like);
    //         // set the owning side to null (unless already changed)
    //         if ($like->getIdProduct() === $this) {
    //             $like->setIdProduct(null);
    //         }
    //     }

    //     return $this;
    // }
}
