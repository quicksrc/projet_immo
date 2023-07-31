<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('DateModification', DateType::class, [
            //     'required' => false,
            //     'label' => 'Date Modification',
            //     'format' => 'yyyy-MM-dd',
            //     'attr' => [
            //         'placeholder' => 'Date Modification',
            //         'class' => 'form-control',
            //     ]
            // ])
            ->add('Civilite', TextType::class, [
                'required' => false,
                'label' => 'Civilite',
                'attr' => [
                    'placeholder' => 'Civilite',
                    'class' => 'form-control'
                ]
            ])
            ->add('Nom', TextType::class, [
                'required' => false,
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control'
                ]
            ])
            ->add('Prenom', TextType::class, [
                'required' => false,
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom',
                    'class' => 'form-control'
                ]
            ])
            ->add('Societe', TextType::class, [
                'required' => false,
                'label' => 'Societé',
                'attr' => [
                    'placeholder' => 'Societé',
                    'class' => 'form-control'
                ]
            ])
            ->add('Correspondant', TextType::class, [
                'required' => false,
                'label' => 'Correspondant',
                'attr' => [
                    'placeholder' => 'Correspondant',
                    'class' => 'form-control'
                ]
            ])
            ->add('Adresse', TextType::class, [
                'required' => false,
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Adresse',
                    'class' => 'form-control'
                ]
            ])
            ->add('CP', TextType::class, [
                'required' => false,
                'label' => 'CP',
                'attr' => [
                    'placeholder' => 'CP',
                    'class' => 'form-control'
                ]
            ])
            ->add('Ville', TextType::class, [
                'required' => false,
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Ville',
                    'class' => 'form-control'
                ]
            ])
            ->add('Pays', TextType::class, [
                'required' => false,
                'label' => 'Pays',
                'attr' => [
                    'placeholder' => 'Pays',
                    'class' => 'form-control'
                ]
            ])
            ->add('Telephone', TelType::class, [
                'required' => false,
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'N° Téléphone',
                    'class' => 'form-control',
                ]
            ])
            ->add('Fax', TelType::class, [
                'required' => false,
                'label' => 'N° Fax',
                'attr' => [
                    'placeholder' => 'N° Fax',
                    'class' => 'form-control',
                ]
            ])
            ->add('TelephonePortable', TelType::class, [
                'required' => false,
                'label' => 'N° Téléphone Portable',
                'attr' => [
                    'placeholder' => 'N° Téléphone Portable',
                    'class' => 'form-control',
                ]
            ])
            ->add('TelephoneDomicile', TelType::class, [
                'required' => false,
                'label' => 'N° Téléphone Domicile',
                'attr' => [
                    'placeholder' => 'N° Téléphone Domicile',
                    'class' => 'form-control',
                ]
            ])
            ->add('ListeRouge', TextType::class, [
                'required' => false,
                'label' => 'Liste Rouge',
                'attr' => [
                    'placeholder' => 'Liste Rouge',
                    'class' => 'form-control',
                ]
            ])
            ->add('Email', EmailType::class, [
                'required' => false,
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Email',
                    'class' => 'form-control',
                ]
            ])
            ->add('DateNaissance', DateType::class, [
                'required' => false,
                'label' => 'Date de Naissance',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Date de Naissance',
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('Activite', TextType::class, [
                'required' => false,
                'label' => 'Activite',
                'attr' => [
                    'placeholder' => 'Activite',
                    'class' => 'form-control',
                ]
            ])
            ->add('RCS', TextType::class, [
                'required' => false,
                'label' => 'RCS',
                'attr' => [
                    'placeholder' => 'RCS',
                    'class' => 'form-control',
                ]
            ])
            ->add('AntiMailing', ChoiceType::class, [
                'required' => false,
                'label' => 'AntiMailing',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'AntiMailing',
                    'class' => 'form-control',
                ]
            ])
            ->add('NPAI', ChoiceType::class, [
                'required' => false,
                'label' => 'NPAI',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'NPAI',
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
            ->add('Fonction', TextType::class, [
                'required' => false,
                'label' => 'Fonction',
                'attr' => [
                    'placeholder' => 'Fonction',
                    'class' => 'form-control',
                ]
            ])
            ->add('DCD', ChoiceType::class, [
                'required' => false,
                'label' => 'NPAI',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'NPAI',
                    'class' => 'form-control',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
