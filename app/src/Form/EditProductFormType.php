<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', Type\TextType::class, [
                'label' => 'Title (form class)',
                'required' => true
            ])
            ->add('price', Type\NumberType::class, [
                'label' => 'Price (form class)',
                'scale' => 2,
                'html5' => true,
                'attr' => [
                    'step' => '0.01'
                ]
            ])
            ->add('quantity')
            ->add('description')
            ->add('isPublished')
            ->add('isDeleted')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
