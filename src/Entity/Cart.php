<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
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
  private $title;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Product", mappedBy="cart")
   * @ORM\JoinColumn(nullable=true)
   */
  private $products;

  public function __construct()
  {
    $this->createdAt = new \DateTime();
    $this->products = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getTitle(): ?string
  {
    return $this->title;
  }

  public function setTitle(string $title): self
  {
    $this->title = $title;

    return $this;
  }

  public function getCreatedAt(): ?\DateTimeInterface
  {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTimeInterface $createdAt): self
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  /**
   * @return Collection|Product[]
   */
  public function getProducts(): Collection
  {
    return $this->products;
  }

  public function addProduct(Product $product): self
  {
    if (!$this->products->contains($product)) {
      $this->products[] = $product;
      $product->setCart($this);
    }

    return $this;
  }

  public function removeProduct(Product $product): self
  {
    if ($this->products->contains($product)) {
      $this->products->removeElement($product);
      // set the owning side to null (unless already changed)
      if ($product->getCart() === $this) {
        $product->setCart(null);
      }
    }

    return $this;
  }

  public function __toString()
  {
    return $this->title;
  }

}
