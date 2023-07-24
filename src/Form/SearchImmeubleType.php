<?php

namespace App\Form;

use App\Entity\RechercheImmeuble;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchImmeubleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('refProprioImmeuble', NumberType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Réf. propriétaire',
                    'class' => 'form-control mt-4 col-5'
                ]
            ])
            ->add('ncpcf', CheckboxType::class, [
                'required' => false,
                'label' => 'NCPCF',
                'label_attr' => [
                    'class' => 'form-check-label mt-4',
                    'for' => 'btnCheckNCPCF'
                ],
                'attr' => [
                    'placeholder' => 'NCPCF',
                    'class' => 'form-check-input mt-4 ms-4'
                ]
            ])
            ->add('origineContact', ChoiceType::class, [
                'required' => false,
                'label' => 'Origine Contact',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],

                'choices' => [
                    'Mailing' => 'Mailing',
                    'Intermédiaire' => 'Intermédiaire',
                    'Téléphone' => 'Téléphone',
                    'Prospection' => 'Prospection',
                    'Presse' => 'Presse',
                    'Retombée clientèle' => 'Retombée clientèle',
                ],
                'attr' => [
                    'class' => 'form-select',
                    'placeholder' => 'Description'
                ]
            ])
            ->add('visite', CheckboxType::class, [
                'required' => false,
                'label' => 'Visite',
                'label_attr' => [
                    'class' => 'form-check-label mt-4',
                    'for' => 'btnCheckVisite'
                ],
                'attr' => [
                    'class' => 'form-check-input mt-4 ms-4',
                    'id' => 'btnCheckVisite'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RechercheImmeuble::class,
        ]);
    }
}
