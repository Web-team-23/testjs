<?php

namespace App\Form;

use App\Entity\Cart;
use App\Entity\Product;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CartType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
      ->add('title')
      ->add('products', EntityType::class, [
        'class' => Product::class,
        'label' => 'produits',
        'required' => false,
        'choice_label' => 'name',
        'multiple' => true,
      ])
      ->add('createdAt', DateType::class, [
        'widget' => 'single_text',
        'label' => 'date de création',
      ]);
  }

  public function configureOptions(OptionsResolver $resolver)
  {
    $resolver->setDefaults([
      'data_class' => Cart::class,
    ]);
  }
}
