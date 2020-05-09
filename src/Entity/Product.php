<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @Vich\Uploadable()
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
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="products", cascade={"persist"})
   */
  private $tags;

  /**
   * @ORM\OneToOne(targetEntity="App\Entity\Image", inversedBy="product", cascade={"persist","remove"})
   */
  private $image;

  /**
   * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
   */
  private $imageFile;

  /**
   * @ORM\ManyToOne(targetEntity="App\Entity\Cart", inversedBy="products")
   * @ORM\JoinColumn(nullable=true)
   */
  private $cart;


  public function __construct()
  {
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
    $this->tags = new ArrayCollection();
  }

  public function getImage(): ?Image
  {
    return $this->image;
  }

  public function setImage( $image)
  {
    $this->image = $image;

    return $this;
  }

  /**
   * @param File|null $imageFile
   * @return Product
   * @throws Exception
   */
  public function setImageFile( ?File $imageFile = null)
  {
    $this -> imageFile = $imageFile;
    if ($this -> imageFile instanceof UploadedFile) {
      $this->updatedAt = new \DateTime('now');
    }
    return $this;
  }


  public function getImageFile()
  {
    return $this -> imageFile;
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
  public function getCreatedAt(): ?\DateTimeInterface
  {
    return $this->createdAt;
  }

  public function setCreatedAt(\DateTimeInterface $createdAt): self
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  public function getUpdatedAt(): ?\DateTimeInterface
  {
    return $this->updatedAt;
  }

  public function setUpdatedAt(\DateTimeInterface $updatedAt): self
  {
    $this->updatedAt = $updatedAt;

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
