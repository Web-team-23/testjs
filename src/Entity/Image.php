<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 * @Vich\Uploadable()
 */
class Image
{
  /**
   * @ORM\Id()
   * @ORM\GeneratedValue()
   * @ORM\Column(type="integer")
   */
  private $id;

  /**
   * @var string|null
   * @ORM\Column(type="string", length=255, nullable=true)
   */
  private $name;

  /**
   * @Vich\UploadableField(mapping="product_images", fileNameProperty="name")
   */
  private $imageFile;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\Column(type="datetime")
   */
  private $updatedAt;

  /**
   * @ORM\OneToOne(targetEntity="App\Entity\Product", mappedBy="image", cascade={"persist"})
   */
  private $product;

  public function __construct()
  {
    $this->createdAt = new DateTime();
    $this->updatedAt = new DateTime();
  }


  public function getProduct(): ?Product
  {
    return $this->product;
  }


  public function setProduct($product)
  {
    $this->product = $product;
  }


  /**
   * @param File|null $imageFile
   * @return Image
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

  public function getId(): ?int
  {
    return $this->id;
  }


  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(?string $image): self
  {
    $this->name = $image;

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

  public function getUpdatedAt(): ?\DateTimeInterface
  {
    return $this->updatedAt;
  }

  public function setUpdatedAt(\DateTimeInterface $updatedAt): self
  {
    $this->updatedAt = $updatedAt;

    return $this;
  }



  public function __toString()
  {
    if(is_null($this->name)) {
      return '';
    }
    return $this->name;
  }

}
