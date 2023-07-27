<?php

namespace App\Form;

use App\Entity\Immeuble;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmeubleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ReferenceProprio', NumberType::class, [
                'required' => false,
                'label' => 'Réf. propriétaire',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Réf. propriétaire',
                    'readonly' => ""
                ]
            ])
            ->add('NumPlancheCadastrale', TextType::class, [
                'required' => false,
                'label' => 'N° planche cadastrale',
                'attr' => [
                    'placeholder' => 'N° planche cadastrale',
                    'class' => 'form-control'
                ]
            ])
            // ->add('NumPlancheCadastrale')
            ->add('EtatDossier', ChoiceType::class, [
                'required' => false,
                'label' => 'Etat Dossier',
                'choices' => [
                    'En cours' => 'En cours',
                    'À classer' => 'A classer'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Etat Dossier'
                ]
            ])
            ->add('Enquete', ChoiceType::class, [
                'required' => false,
                'label' => 'Enquete',
                'choices' => [
                    'Enquete juste' => 'Enquete juste',
                    'Enquete a faire' => 'Enquete a faire',
                    'Cadastre' => 'Cadastre',
                    'Memotel' => 'Memotel',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Enquete'
                ]
            ])
            // ->add('DateEnquete', DateType::class, [
            //     'required' => false,
            //     'label' => 'Date d\'enquête',
            //     'attr' => [
            //         'placeholder' => 'Date d\'enquête',
            //         'class' => 'form-control',
            //     ]
            // ])
            ->add('Description', ChoiceType::class, [
                'required' => false,
                'label' => 'Description',
                'choices' => [
                    'Maison' => 'Maison',
                    'Lot' => 'Lot',
                    'Immeuble' => 'Immeuble',
                    'Hotel' => 'Hotel',
                    'Batiment' => 'Batiment',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Description'
                ]
            ])
            ->add('SuiviPar', ChoiceType::class, [
                'required' => false,
                'label' => 'Suivi par',
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
                    'class' => 'form-control',
                    'placeholder' => 'Suivi par'
                ]
            ])
            ->add('Vendu', ChoiceType::class, [
                'required' => false,
                'label' => 'Vendu',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Vendu',
                    'class' => 'form-control',
                ]
            ])

            ->add('NCPCF', ChoiceType::class, [
                'required' => false,
                'label' => 'NCPCF',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'NCPCF',
                    'class' => 'form-control',
                ]
            ])
            ->add('OrigineContact', ChoiceType::class, [
                'required' => false,
                'label' => 'Origine Contact',
                'choices' => [
                    'Mailing' => 'Mailing',
                    'Intermédiaire' => 'Intermédiaire',
                    'Téléphone' => 'Téléphone',
                    'Prospection' => 'Prospection',
                    'Presse' => 'Presse',
                    'Retombée clientèle' => 'Retombée clientèle',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Suivi par'
                ]
            ])
            ->add('Visite', ChoiceType::class, [
                'required' => false,
                'label' => 'Visité',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Visité',
                    'class' => 'form-control',
                ]
            ])
            ->add('Commentaire', TextType::class, [
                'required' => false,
                'label' => 'Commentaire',
                'attr' => [
                    'placeholder' => 'Commentaire',
                    'class' => 'form-control',
                    'row' => '3'
                ]
            ])
            ->add('NomGardien', TextType::class, [
                'required' => false,
                'label' => 'Nom Gardien',
                'attr' => [
                    'placeholder' => 'Nom Gardien',
                    'class' => 'form-control',
                ]
            ])

            // ->add('DateVente', DateType::class, [
            //     'required' => false,
            //     'label' => 'Date Vente',
            //     'attr' => [
            //         'placeholder' => 'Date Vente',
            //         'class' => 'form-row col-md-3',
            //     ]
            // ])
            // ->add('OrigineContact', ChoiceType::class, [
            //     'required' => false,
            //     'label' => 'Origine Contact',
            //     'choices' => [
            //         'JAL' => 'JAL',
            //         'JAL-JSS' => 'JAL-JSS',
            //         'JAL-GP' => 'JAL-GP',
            //         'JAL-AS' => 'JAL-AS',
            //         'JAL-PA' => 'JAL-PA',
            //         'Fichier Immobilier' => 'Fichier Immobilier',
            //         'INT-Avocat' => 'INT-Avocat',
            //         'INT' => 'INT',
            //         'INT-Notaire' => 'INT-Notaire',
            //         'INT-Expert Comptable' => 'INT-Expert Comptable',
            //         'Propection' => 'Propection'
            //     ],
            //     'attr' => [
            //         'class' => 'form-control',
            //         'placeholder' => 'Origine Contact'
            //     ]
            // ])
            ->add('Intermediaire', TextType::class, [
                'required' => false,
                'label' => 'Intermediaire',
                'attr' => [
                    'class' => 'Intermediaire',
                    'class' => 'form-control',
                ]
            ])
            ->add('NumPrincipal', TelType::class, [
                'required' => false,
                'label' => 'N° Principal',
                'attr' => [
                    'placeholder' => 'N° Principal',
                    'class' => 'form-control',
                ]
            ])
            ->add('NumSecondaire', TelType::class, [
                'required' => false,
                'label' => 'N° Secondaire',
                'attr' => [
                    'class' => 'N° Secondaire',
                    'class' => 'form-control',
                ]
            ])
            ->add('TypeVoie', ChoiceType::class, [
                'required' => false,
                'label' => 'Type Voie',
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
                    'class' => 'form-control',
                    'placeholder' => 'Type Voie',
                ]
            ])
            ->add('NomRue', TextType::class, [
                'required' => false,
                'label' => 'Nom Rue',
                'attr' => [
                    'placeholder' => 'Nom Rue',
                    'class' => 'form-control',
                ]
            ])
            ->add('Adresse', TextType::class, [
                'required' => false,
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Adresse',
                    'class' => 'form-control',
                ]
            ])
            ->add('CP', TextType::class, [
                'required' => false,
                'label' => 'Code Postal',
                'attr' => [
                    'placeholder' => 'CP',
                    'class' => 'form-control',
                ]
            ])
            ->add('Ville', TextType::class, [
                'required' => false,
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Ville',
                    'class' => 'form-control',
                ]
            ])
            ->add('ContactPrincipal', TextType::class, [
                'required' => false,
                'label' => 'Contact Principal',
                'attr' => [
                    'class' => 'Contact Principal',
                    'class' => 'form-control',
                ]
            ])
            ->add('Photo1', FileType::class, [
                'required' => false,
                'label' => 'Photo N°1',
                'attr' => [
                    'placeholder' => 'Photo N°1',
                    'class' => 'form-control',
                ]
            ])
            ->add('Photo2', FileType::class, [
                'required' => false,
                'label' => 'Photo N°2',
                'attr' => [
                    'class' => 'Photo N°2',
                    'class' => 'form-control',
                ]
            ]);

        // ->add('DateVisite', DateType::class, [
        //     'required' => false,
        //     'label' => 'Date Visite',
        //     'attr' => [
        //         'class' => 'Date Visite',
        //         'class' => 'form-control',
        //     ]
        // ])
        // ->add('RegroupementAct', TextType::class, [
        //     'required' => false,
        //     'label' => 'Regroupement Act',
        //     'attr' => [
        //         'class' => 'Regroupement Act',
        //         'class' => 'form-control',
        //     ]
        // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Immeuble::class,
        ]);
    }
}
