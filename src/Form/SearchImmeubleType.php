<?php

namespace App\Form;

use App\Entity\Civilite;
use App\Entity\Enquete;
use App\Entity\OrigineContactImmeuble;
use App\Entity\QualiteProprietaire;
use App\Entity\RechercheImmeuble;
use App\Entity\TypeVoie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                    'class' => 'form-label  ms-2'
                ],
                'attr' => [
                    'class' => 'form-check-input  ms-2'
                ]
            ])
            ->add('origineContact', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Origine Contact',
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => OrigineContactImmeuble::class,
                'choice_label' => 'libelle',
                'choice_value' => 'libelle'
            ])
            ->add('visite', CheckboxType::class, [
                'required' => false,
                'label' => 'Visite',
                'label_attr' => [
                    'class' => 'form-label',
                    'for' => 'btnCheckVisite'
                ],
                'attr' => [
                    'class' => 'form-check-input ms-2',
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
            ->add('typeVoie', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Type de Voie',
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => TypeVoie::class,
                'choice_label' => 'libelle',
                //dd('libelle')
                'choice_value' => 'Libelle'
            ])
            ->add('nomRue', TextType::class, [
                'required' => false,
                'label' => 'Nom de Voie',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('cp', TextType::class, [
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
            ->add('civiliteContact', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Civilité',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => Civilite::class,
                'choice_label' => 'libelle',
                'choice_value' => 'libelle'
            ])
            ->add('enqueteImmeuble', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Enquête',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => Enquete::class,
                'choice_label' => 'libelle',
                'choice_value' => 'libelle'
            ])
            ->add('cpImmeubleContact', TextType::class, [
                'required' => false,
                'label' => 'CP',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('villeImmeubleContact', TextType::class, [
                'required' => false,
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('qualiteProprietaire', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Qualité Propriétaire',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => QualiteProprietaire::class,
                'choice_label' => 'libelle',
                'choice_value' => 'libelle'
            ])
            ->add('antiMailing', ChoiceType::class, [
                'required' => false,
                'label' => 'Anti-Mailing',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Anti-Mailing',
                    'class' => 'form-control',
                ]
            ])
            ->add('npai', ChoiceType::class, [
                'required' => false,
                'label' => 'NPAI',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'NPAI',
                    'class' => 'form-control',
                ]
            ])
            ->add('prenomContact', TextType::class, [
                'required' => false,
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('dateActivite', DateType::class, [
                'required' => false,
                'label' => 'Date Activité',
                'widget' => 'single_text',
                'format' => "yyyy-MM-dd 00:00:00",
                'html5' => false,
                'attr' => [
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('theme', ChoiceType::class, [
                'required' => false,
                'label' => 'Thême',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'Date du contact' => 'Date du contact',
                    'Réunion' => 'Réunion',
                    'Mailing' => 'Mailing',
                    'A recontacter' => 'A recontacter',
                    'Retour mailing' => 'Retour mailing',
                    'Archivage Contact' => 'Archivage Contact',
                    'Prospection' => 'Prospection',
                    'Top Ten' => 'Top Ten',
                ],
                'attr' => [
                    'class' => 'form-select',
                ]
            ])

            ->add('etatDossier', ChoiceType::class, [
                'required' => false,
                'label' => 'Etat du Dossier',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'En cours' => 'En cours',
                    'A classer' => 'A classer',
                    'A visiter' => 'A visiter',
                ],
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('nomRecherche', TextType::class, [
                'required' => false,
                'label' => 'Nom de la Recherche',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Indiquer un nom pour sauvegarder'
                ]
            ])
            ->add('creeactiv', SubmitType::class, [
                'label' => 'Créer Activité',
                'attr' => [
                    'class' => 'btn btn-primary mt-5 mb-1',
                    'style' => 'margin-right: 30%;'
                ]
            ])
            ->add('saveRechercheImmeuble', SubmitType::class, [
                'label' => 'Sauvegarder',
                'attr' => [
                    'class' => 'btn btn-primary mt-5 mb-1',
                    'style' => 'margin-right: 30%;'
                ]
            ])
            ->add('saveRechercheImmeubleAdress', SubmitType::class, [
                'label' => 'Sauvegarder',
                'attr' => [
                    'class' => 'btn btn-primary mt-5 mb-1',
                    'style' => 'margin-right: 30%;'
                ]
            ])
            ->add('saveRechercheImmeubleContact', SubmitType::class, [
                'label' => 'Sauvegarder',
                'attr' => [
                    'class' => 'btn btn-primary mt-5 mb-1',
                    'style' => 'margin-right: 30%;'
                ]
            ])
            ->add('saveRechercheImmeubleActivite', SubmitType::class, [
                'label' => 'Sauvegarder',
                'attr' => [
                    'class' => 'btn btn-primary mt-5 mb-1',
                    'style' => 'margin-right: 30%;'
                ]
            ])
            ->add('rechercheImmeuble', SubmitType::class, [
                'label' => 'Rechercher Par Immeuble',
                'attr' => [
                    'class' => 'btn btn-success mt-5 mb-1',
                    'value' => 'buton1',
                ]
            ])
            ->add('rechercheAdresse', SubmitType::class, [
                'label' => 'Rechercher Par Adresse',
                'attr' => [
                    'class' => 'btn btn-success  mt-5 mb-1'
                ]
            ])
            ->add('rechercheContact', SubmitType::class, [
                'label' => 'Rechercher Par Contact',
                'attr' => [
                    'class' => 'btn btn-success  mt-5 mb-1'
                ]
            ])
            ->add('rechercheActivite', SubmitType::class, [
                'label' => 'Rechercher Par Activite',
                'attr' => [
                    'class' => 'btn btn-success  mt-5 mb-1'
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
