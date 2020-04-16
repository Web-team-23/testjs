<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\Tag;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TagType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name')
      ->add('products', EntityType::class, [
        'class' => Product::class,
        'label' => 'products',
        'required' => false,
        'choice_label' => 'name',
        'multiple' => true,
        'by_reference' => false,
      ])
      ->add('createdAt', DateType::class, [
        'widget' => 'single_text',
        'label' => 'date de création',
      ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Tag::class,
    ]);
  }
}
