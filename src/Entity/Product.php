<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


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
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $description;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="products")
   */
  private $tags;

  /**
   * @ORM\OneToOne(targetEntity="App\Entity\Image", mappedBy="product", cascade={"persist", "remove"})
   *
   */
  private $image;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Cart", inversedBy="products")
   * @ORM\JoinColumn(nullable=true)
   */
  private $cart;


  public function __construct()
  {
    $this->createdAt = new \DateTime();
    $this->tags = new ArrayCollection();
  }

  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param mixed $id
   */
  public function setId($id): void
  {
    $this->id = $id;
  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @param mixed $name
   */
  public function setName($name): void
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return $this->description;
  }

  /**
   * @param mixed $description
   */
  public function setDescription($description): void
  {
    $this->description = $description;
  }

  /**
   * @return mixed
   */
  public function getCreatedAt(): ?\DateTimeInterface
  {
    return $this->createdAt;
  }

  /**
   * @param mixed $createdAt
   * @return Product
   */
  public function setCreatedAt(\DateTimeInterface $createdAt): self
  {
    $this->createdAt = $createdAt;
    return $this;
  }

  /**
   * @return Collection|Tag[]
   */
  public function getTags(): Collection
  {
    return $this->tags;
  }

  public function addTag(Tag $tag): self
  {
    if (!$this->tags->contains($tag)) {
      $this->tags[] = $tag;
      $tag->addProduct($this);
    }

    return $this;
  }

  public function removeTag(Tag $tag): self
  {
    if ($this->tags->contains($tag)) {
      $this->tags->removeElement($tag);
      $tag->removeProduct($this);
    }

    return $this;
  }

  public function getImage(): ?Image
  {
    return $this->image;
  }

  public function setImage(?Image $image): self
  {
    $this->image = $image;

    // set (or unset) the owning side of the relation if necessary
    $newProduct = null === $image ? null : $this;
    if ($image->getProduct() !== $newProduct) {
      $image->setProduct($newProduct);
    }

    return $this;
  }


  /**
   * @return mixed
   */
  public function __toString()
  {
    return $this->name;
  }

  /**
   * @return Cart|null
   */
  public function getCart(): ?Cart
  {

      return $this->cart;
  }

  /**
   * @param Cart|null $cart
   * @return $this
   */
  public function setCart(?Cart $cart): self
  {
      $this->cart = $cart;

      return $this;
  }




}
