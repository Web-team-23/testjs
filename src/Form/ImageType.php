<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name')
      ->add('createdAt', DateType::class, [
        'widget' => 'single_text',
        'label' => 'date de création',
      ])
      ->add('product', EntityType::class, [
        'class' => Product::class,
        'label' => 'produit associé',
        'required' => false,
        'choice_label' => 'name',
      ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Image::class,
    ]);
  }
}
