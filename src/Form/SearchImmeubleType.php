<?php

namespace App\Form;

use App\Entity\RechercheImmeuble;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
                'label' => 'Réf. propriétaire',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('ncpcf', CheckboxType::class, [
                'required' => false,
                'label' => 'NCPCF',
                'label_attr' => [
                    'class' => 'form-label mt-3'
                ],
                'attr' => [
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
                    'class' => 'form-label mt-3',
                    'for' => 'btnCheckVisite'
                ],
                'attr' => [
                    'class' => 'form-check-input mt-4 ms-4',
                    'id' => 'btnCheckVisite'
                ]
            ])
            ->add('numPrincipal', IntegerType::class, [
                'required' => false,
                'label' => 'Numéro Principal',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('typeVoie', ChoiceType::class, [
                'required' => false,
                'label' => 'Type Voie',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'choices' => [
                    'place' => 'place',
                    'rue' => 'rue',
                    'porte' => 'porte',
                    'imp' => 'imp',
                    'gale' => 'gale',
                    'av' => 'av',
                    'bd' => 'bd',
                    'qual' => 'qual',
                    'pass' => 'pass',
                    'cite' => 'cite',
                    'cour' => 'cour',
                    'sq' => 'sq',
                    'port' => 'port',
                    'allee' => 'allee',
                    'carre' => 'carre',
                    'villa' => 'villa',
                    'espl' => 'espl',
                    'parc' => 'parc',
                    'cours' => 'cours',
                    'rdpt' => 'rdpt',
                    'ham' => 'ham',
                    'pking' => 'pking',
                    'gde' => 'gde',
                    'chaus' => 'chaus',
                    'sente' => 'sente',
                    'route' => 'route',
                    'chem' => 'chem',
                    'voie' => 'voie',
                    'resid' => 'resid',
                    'z.c.' => 'z.c.',
                    'ruelle' => 'ruelle',
                    'gde rue' => 'gde rue',
                ],
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('nomRue', TextType::class, [
                'required' => false,
                'label' => 'Nom de Rue',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('cp', IntegerType::class, [
                'required' => false,
                'label' => 'CP',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('ville', TextType::class, [
                'required' => false,
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('nomContact', TextType::class, [
                'required' => false,
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('RCS', TextType::class, [
                'required' => false,
                'label' => 'RCS',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('email', EmailType::class, [
                'required' => false,
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('civiliteContact', ChoiceType::class, [
                'required' => false,
                'label' => 'Type Voie',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'Maître' => 'Maître',
                    'SCI' => 'SCI',
                    'Madame' => 'Madame',
                    'Monsieur' => 'Monsieur',
                    'Cabinet' => 'Cabinet',
                    'Indivision' => 'Indivision',
                    'Copropriété' => 'Copropriété',
                    'SNC' => 'SNC',
                    'Sté' => 'Sté',
                    'Association' => 'Association',
                    'Succession' => 'Succession',
                    'Consort' => 'Consort',
                    'Mme et Mr' => 'Mme et Mr',
                    'Entreprise' => 'Entreprise',
                    'Melle' => 'Melle',
                    'Etude' => 'Etude',
                    'Agence' => 'Agence',
                    'Messieurs' => 'Messieurs',
                ],
                'attr' => [
                    'class' => 'form-select',
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
