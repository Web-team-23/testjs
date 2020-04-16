<?php

namespace App\Form;

use App\Entity\Cart;
use App\Entity\Image;
use App\Entity\Product;
use App\Entity\Tag;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
  /**
   * @param FormBuilderInterface $builder
   * @param array $options
   */
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('name')
      ->add('description')
      ->add('tags', EntityType::class, [
        'class' => Tag::class,
        'label' => 'tags',
        'required' => false,
        'choice_label' => 'name',
        'multiple' => true,
        'by_reference' => false,
      ])
      ->add('image', EntityType::class, [
        'class' => Image::class,
        'label' => 'image associée',
        'required' => false,
        'choice_label' => 'name',
      ])
      ->add('cart', EntityType::class, [
        'class' => Cart::class,
        'label' => 'panier associé',
        'required' => false,
        'choice_label' => 'title',
      ])
      ->add('createdAt', DateType::class, [
        'widget' => 'single_text',
        'label' => 'date de création',
      ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Product::class,
    ]);
  }
}
