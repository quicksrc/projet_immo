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
                    'class' => 'form-control mt-4'
                ]
            ])
            ->add('numPlanchCada', NumberType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'N° planche cadastrale',
                    'class' => 'form-control mt-4'
                ]
            ])
            ->add('etatDossier', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'En cours' => 'En cours',
                    'À classer' => 'A classer'
                ],
                'attr' => [
                    'class' => 'form-select mt-4',
                    'placeholder' => 'Etat Dossier'
                ]
            ])
            ->add('enquete', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Mémotel' => 'Mémotel',
                    'Enquête juste' => 'Enquête juste'
                ],
                'attr' => [
                    'class' => 'form-select mt-4',
                    'placeholder' => 'Enquete'
                ]
            ])
            ->add('dateEnquete', DateType::class, [
                'required' => false,
                'label' => false,
                'format' => 'dd-MM-yyyy',
                'years' => range(date('Y') - 30, date('Y')),
                'attr' => [
                    'class' => 'Date d\'enquête',
                    'class' => 'form-control mt-4'
                ]
            ])
            ->add('description', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Maison' => 'Maison',
                    'Lot' => 'Lot',
                    'Immeuble' => 'Immeuble',
                    'Hotel' => 'Hotel',
                    'Batiment' => 'Batiment',
                ],
                'attr' => [
                    'class' => 'form-select mt-4',
                    'placeholder' => 'Description'
                ]
            ])
            ->add('suiviPar', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'AD' => 'AD',
                    'AH' => 'AH',
                    'AK' => 'AK',
                    'AMV' => 'AMV',
                    'BdP' => 'BdP',
                    'DP' => 'DP',
                    'EDH' => 'EDH',
                    'OC' => 'OC',
                    'IC' => 'IC',
                    'MB' => 'MB',
                    'MT' => 'MT',
                    'TP' => 'TP',
                    'LC' => 'LC',
                ],
                'attr' => [
                    'class' => 'form-select mt-4',
                    'placeholder' => 'Suivi par'
                ]
            ])
            ->add('vendu', CheckboxType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Vendu',
                    'class' => 'form-check-input mt-4'
                ]
            ])
            ->add('ncpcf', CheckboxType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'NCPCF',
                    'class' => 'form-check-input mt-4'
                ]
            ])
            ->add('origineContact', ChoiceType::class, [
                'required' => false,
                'choices' => [
                    'Mailing' => 'Mailing',
                    'Intermédiaire' => 'Intermédiaire',
                    'Téléphone' => 'Téléphone',
                    'Prospection' => 'Prospection',
                    'Presse' => 'Presse',
                    'Retombée clientèle' => 'Retombée clientèle',
                ],
                'attr' => [
                    'class' => 'form-select mt-4',
                    'placeholder' => 'Description'
                ]
            ])
            ->add('visite', CheckboxType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Visité',
                    'class' => 'form-check-input mt-4'
                ]
            ])
            ->add('commentaire', TextType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => 'Commentaire',
                    'class' => 'form-control',
                    'row' => '3'
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
