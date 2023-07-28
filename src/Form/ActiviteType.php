<?php

namespace App\Form;

use App\Entity\Activite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActiviteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DateActivite', DateType::class, [
                'required' => false,
                'label' => 'Date Activite',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Date Activite',
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('Theme', ChoiceType::class, [
                'required' => false,
                'label' => 'Theme',
                'choices' => [
                    'Mailing' => 'Mailing',
                    'Date du contact' => 'Date du contact',
                    'Réunion' => 'Réunion',
                    'Prospection' => 'Prospection',
                    'Retour mailing' => 'Retour mailing',
                    'Top Ten' => 'Top Ten',
                ],
                'attr' => [
                    'placeholder' => 'Theme',
                    'class' => 'form-control',
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
            ->add('Action', TextType::class, [
                'required' => false,
                'label' => 'Action',
                'attr' => [
                    'placeholder' => 'Action',
                    'class' => 'form-control',
                ]
            ]);
        // ->add('NomFichier', TextType::class, [
        //     'required' => false,
        //     'label' => 'NomFichier',
        //     'attr' => [
        //         'placeholder' => 'NomFichier',
        //         'class' => 'form-control',
        //     ]
        // ])
        // ->add('Icone', TextType::class, [
        //     'required' => false,
        //     'label' => 'Icone',
        //     'attr' => [
        //         'placeholder' => 'Icone',
        //         'class' => 'form-control',
        //     ]
        // ])
        // ->add('IDImmeuble', TextType::class, [
        //     'required' => false,
        //     'label' => 'IDImmeuble',
        //     'attr' => [
        //         'placeholder' => 'IDImmeuble',
        //         'class' => 'form-control',
        //     ]
        // ])
        // ->add('IDContact', TextType::class, [
        //     'required' => false,
        //     'label' => 'IDContact',
        //     'attr' => [
        //         'placeholder' => 'IDContact',
        //         'class' => 'form-control',
        //     ]
        // ])
        // ->add('IDSociete', TextType::class, [
        //     'required' => false,
        //     'label' => 'IDSociete',
        //     'attr' => [
        //         'placeholder' => 'IDSociete',
        //         'class' => 'form-control',
        //     ]
        // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Activite::class,
        ]);
    }
}
