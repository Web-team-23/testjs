<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
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
   * @ORM\Column(type="string", length=255)
   */
  private $name;

  /**
   * @ORM\Column(type="datetime")
   */
  private $createdAt;

  /**
   * @ORM\OneToOne(targetEntity="App\Entity\Product", inversedBy="image", cascade={"persist"})
   */
  private $product;

  public function __construct()
  {
    $this->createdAt = new \DateTime();
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

  /**
   * @return mixed
   */
  public function getCreatedAt(): ?\DateTimeInterface
  {
    return $this->createdAt;
  }

  /**
   * @param mixed $createdAt
   * @return Image
   */
  public function setCreatedAt(\DateTimeInterface $createdAt): self
  {
    $this->createdAt = $createdAt;
    return $this;
  }

  public function getProduct(): ?Product
  {
    return $this->product;
  }

  public function setProduct(?Product $product): self
  {
    $this->product = $product;
    return $this;
  }

  public function __toString()
  {
    return $this->name;
  }

}
