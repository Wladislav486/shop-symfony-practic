<?php

namespace App\Form;

use App\Entity\Product;
use App\Form\Dto\EditProductModel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EditProductFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', Type\TextType::class, [
                'label' => 'Title',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Should be filled'
                    ])
                ]
            ])
            ->add('price', Type\NumberType::class, [
                'label' => 'Price',
                'scale' => 2,
                'html5' => true,
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'min' => 0,
                    'step' => '0.01'
                ]
            ])
            ->add('quantity', Type\IntegerType::class, [
                'label' => 'Quantity',
                'required' => true,
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('description', Type\TextareaType::class, [
                'label' => 'Description',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'overflow: hidden;'
                ]
            ])

            ->add('newImage', Type\FileType::class, [
                'label' => 'Choose new image',
                'required' => false,
                'mapped' => false, // в сущности данного поля нет
                'attr' => [
                    'class' => 'form-control-file',
                ]
            ])


            ->add('isPublished', Type\CheckboxType::class, [
                'label' => 'Is published',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                    'style' => 'overflow: hidden;'
                ],
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
            ])
            ->add('isDeleted', Type\CheckboxType::class, [
                'label' => 'Is deleted',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input',
                    'style' => 'overflow: hidden;'
                ],
                'label_attr' => [
                    'class' => 'form-check-label'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EditProductModel::class,
        ]);
    }
}
