<?php

namespace App\Form\easyAdmin;

use App\Entity\Tag;
use App\Form\easyAdmin\dataTransformer\StringToArrayTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\DataTransformer\CollectionToArrayTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdminTagType extends AbstractType
{
  /**
   * @var EntityManagerInterface
   */
  private $entityManager;

  public function __construct(EntityManagerInterface $entityManager)
  {
    $this->entityManager = $entityManager;
  }

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->addModelTransformer(new CollectionToArrayTransformer(), true)
      ->addModelTransformer(new StringToArrayTransformer($this->entityManager), true);
  }

  public function getParent()
  {
    return TextType::class;
  }
}
