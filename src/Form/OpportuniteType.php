<?php

namespace App\Form;

use App\Entity\Opportunite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OpportuniteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Date', DateType::class, [
                'required' => false,
                'label' => 'Date',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Date',
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('Commentaire', TextType::class, [
                'required' => false,
                'label' => 'Commentaire',
                'attr' => [
                    'placeholder' => 'Commentaire',
                    'class' => 'form-control',
                ]
            ])
            ->add('SocieteConcernee', ChoiceType::class, [
                'required' => false,
                'label' => 'Societe Concernee',
                'choices' => [
                    'VG - Non Retenu' => 'VG - Non Retenu',
                    'VG - Nommé' => 'VG - Nommé',
                    'Valorim Gestion' => 'Valorim Gestion',
                ],
                'attr' => [
                    'placeholder' => 'Societe Concernee',
                    'class' => 'form-control',
                ]
            ])
            ->add('Gerance', ChoiceType::class, [
                'required' => false,
                'label' => 'Gerance',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Gerance',
                    'class' => 'form-control',
                ]
            ])
            ->add('IDImmeuble', TextType::class, [
                'required' => false,
                'label' => 'ID Immeuble',
                'attr' => [
                    'placeholder' => 'ID Immeuble',
                    'class' => 'form-control',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opportunite::class,
        ]);
    }
}
