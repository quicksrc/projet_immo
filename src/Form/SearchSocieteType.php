<?php

namespace App\Form;

use App\Entity\RechercheSociete;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType as TypeIntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchSocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('etatDossier', ChoiceType::class, [
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
            ->add('responsable', ChoiceType::class, [
                'required' => false,
                'label' => 'Responsable',
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
                    'LS' => 'LS',
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Suivi par'
                ]
            ])
            ->add('origineContact', ChoiceType::class, [
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
            ->add('raisonSocialeVendeur', TextType::class, [
                'required' => false,
                'label' => 'Vendeur Raison Sociale',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('cpVendeur', TextType::class, [
                'required' => false,
                'label' => 'Vendeur CP',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('raisonSocialeAcheteur', TextType::class, [
                'required' => false,
                'label' => 'Acheteur Raison Sociale',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('cpAcheteur', TextType::class, [
                'required' => false,
                'label' => 'Acheteur CP',
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('civiliteContact', ChoiceType::class, [
                'required' => false,
                'label' => 'Civilité',
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
            ])
            ->add('nomContact', TextType::class, [
                'required' => false,
                'label' => 'Nom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('prenomContact', TextType::class, [
                'required' => false,
                'label' => 'Prénom',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('adresseContact', TextType::class, [
                'required' => false,
                'label' => 'Adresse',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('cpContact', TypeIntegerType::class, [
                'required' => false,
                'label' => 'CP',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('villeContact', TextType::class, [
                'required' => false,
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('fonctionContact', ChoiceType::class, [
                'required' => false,
                'label' => 'Fonction',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'Notaire' => 'Notaire',
                    'Administrateur Judiciaire' => 'Administrateur Judiciaire',
                    'Avocat' => 'Avocat',
                    'Avocat - EX CJF' => 'Avocat - EX CJF',
                    'Huissier de Justice' => 'Huissier de Justice',
                    'Mandataire Judiciaire' => 'Mandataire Judiciaire',
                    'Liquidateur Judiciaire' => 'Liquidateur Judiciaire',
                    'Agence Immobilière' => 'Agence Immobilière',
                    'Banque Privée' => 'Banque Privée',
                    'Cabinet Comptable' => 'Cabinet Comptable',
                    'Expert Comptable' => 'Expert Comptable',
                    'Conseil en Gestion / Finances' => 'Conseil en Gestion / Finances',
                    'Intermédiaire' => 'Intermédiaire',
                    'Administrateur de biens' => 'Administrateur de biens',
                    'Assistant Notaire / Avocat' => 'Assistant Notaire / Avocat',
                    'Agent immobilier' => 'Agent immobilier',
                    'Architecte' => 'Architecte',
                    'Promoteur Constructeur' => 'Promoteur Constructeur',
                    'Assurance' => 'Assurance',
                    'Retraite' => 'Retraite',
                    'Particulier' => 'Particulier',
                    'HLM' => 'HLM',
                    'Mutuelle' => 'Mutuelle',
                    'Coproprietaire' => 'Coproprietaire',
                    'Expert Immobilier' => 'Expert Immobilier',
                    'Fonciere' => 'Fonciere',
                    'Géomètre' => 'Géomètre',
                ],
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('correspondantContact', TextType::class, [
                'required' => false,
                'label' => 'Ville',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('antiMailingContact', CheckboxType::class, [
                'required' => false,
                'label' => 'Anti-Mailing',
                'label_attr' => [
                    'class' => 'form-label mt-3',
                    'for' => 'btnCheckAntiMailing'
                ],
                'attr' => [
                    'class' => 'form-check-input mt-4 ms-4',
                    'id' => 'btnCheckAntiMailing'
                ]
            ])
            ->add('principalContact', CheckboxType::class, [
                'required' => false,
                'label' => 'Contact Principal',
                'label_attr' => [
                    'class' => 'form-label mt-3',
                    'for' => 'btnCheckprincipalContact'
                ],
                'attr' => [
                    'class' => 'form-check-input mt-4 ms-4',
                    'id' => 'btnCheckprincipalContact'
                ],
            ])
            ->add('societeContact', TextType::class, [
                'required' => false,
                'label' => 'Société Concernée',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('npaiContact', CheckboxType::class, [
                'required' => false,
                'label' => 'NPAI',
                'label_attr' => [
                    'class' => 'form-label mt-3',
                    'for' => 'btnCheckNPAI'
                ],
                'attr' => [
                    'class' => 'form-check-input mt-4 ms-4',
                    'id' => 'btnCheckNPAI'
                ]
            ])
            ->add('activiteContact', ChoiceType::class, [
                'required' => false,
                'label' => 'Activité',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'Vente de meubles' => 'Vente de meubles',
                    'Marchand de Biens' => 'Marchand de Biens',
                    'Intermédiaire' => 'Intermédiaire',
                    'Hôtellerie' => 'Hôtellerie',
                    'Gestion, Transactions Immobilières' => 'Gestion, Transactions Immobilières',
                ],
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('rcsContact', TextType::class, [
                'required' => false,
                'label' => 'RCS',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('dateActivite', DateTimeType::class, [
                'required' => false,
                'label' => 'Date',
                'widget' => 'single_text',
                'format' => "yyyy-MM-dd 00:00:00",
                'html5' => false,
                'attr' => [
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('themeActivite', ChoiceType::class, [
                'required' => false,
                'label' => 'Thème',
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
            ->add('actionActivite', ChoiceType::class, [
                'required' => false,
                'label' => 'Action',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    'Actions commerciales' => 'Actions commerciales',
                    'Rien à faire' => 'Rien à faire',
                    'RDV' => 'RDV',
                    'Envoi LP/LPS' => 'Envoi LP/LPS',
                    'Appel téléphonique' => 'Appel téléphonique',
                ],
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('commentaireActivite', TextareaType::class, [
                'required' => false,
                'label' => 'Commentaire',
                'label_attr' => [
                    'class' => 'form-label'
                ],
                'attr' => [
                    'class' => 'form-control col-5'
                ]
            ])
            ->add('rechercheActivite', SubmitType::class, [
                'label' => 'Rechercher Par Activité',
                'attr' => [
                    'class' => 'btn btn-success mt-1 mb-1'
                ]
            ])
            ->add('rechercheContact', SubmitType::class, [
                'label' => 'Rechercher Par Contact',
                'attr' => [
                    'class' => 'btn btn-success mt-1 mb-1'
                ]
            ])
            ->add('rechercheSociete', SubmitType::class, [
                'label' => 'Rechercher Par Société',
                'attr' => [
                    'class' => 'btn btn-success mt-1 mb-1'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RechercheSociete::class,
        ]);
    }
}
