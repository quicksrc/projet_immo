<?php

namespace App\Form;

use App\Entity\Societe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocieteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('DateCreation', DateType::class, [
            //     'required' => false,
            //     'label' => 'Date de Creation',
            //     'widget' => 'single_text',
            //     'format' => 'yyyy-MM-dd 00:00:00',
            //     'html5' => false,
            //     'attr' => [
            //         'placeholder' => 'Date de Creation',
            //         'class' => 'form-control js-datepicker',
            //     ]
            // ])
            // ->add('DateModification', DateType::class, [
            //     'required' => false,
            //     'label' => 'Date de Modification',
            //     'widget' => 'single_text',
            //     'format' => 'yyyy-MM-dd 00:00:00',
            //     'html5' => false,
            //     'attr' => [
            //         'placeholder' => 'Date de Modification',
            //         'class' => 'form-control js-datepicker',
            //     ]
            // ])
            ->add('OrigineContact', ChoiceType::class, [
                'required' => false,
                'label' => 'Origine Contact',
                'choices' => [
                    'JAL' => 'JAL',
                    'JAL - JSS' => 'JAL - JSS',
                    'JAL - GP' => 'JAL - GP',
                    'JAL - AS' => 'JAL - AS',
                    'JAL - PA' => 'JAL - PA',
                    'Fichier Immobilier' => 'Fichier Immobilier',
                    'INT - Avocat' => 'INT - Avocat',
                    'INT' => 'INT',
                    'INT - Notaire' => 'INT - Notaire',
                    'INT - Expert Comptable' => 'INT - Expert Comptable',
                    'Propection' => 'Propection'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Origine Contact'
                ]
            ])
            ->add('DateEditionJournal', DateType::class, [
                'required' => false,
                'label' => 'Date Edition Journal',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Date Edition Journal',
                    'class' => 'form-control js-datepicker',
                ]
            ])
            // ->add('NumJAL', NumberType::class, [
            //     'required' => false,
            //     'label' => 'N° JAL',
            //     'attr' => [
            //         'class' => 'form-control',
            //         'placeholder' => 'N° JAL',
            //         'readonly' => ""
            //     ]
            // ])
            ->add('Responsable', TextType::class, [
                'required' => false,
                'label' => 'Responsable',
                'attr' => [
                    'placeholder' => 'Responsable',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurRaisonSociale', TextType::class, [
                'required' => false,
                'label' => 'Vendeur Raison Sociale',
                'attr' => [
                    'placeholder' => 'Vendeur Raison Sociale',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurAdresse', TextType::class, [
                'required' => false,
                'label' => 'Vendeur Adresse',
                'attr' => [
                    'placeholder' => 'Vendeur Adresse',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurCP', TextType::class, [
                'required' => false,
                'label' => 'Vendeur CP',
                'attr' => [
                    'placeholder' => 'Vendeur CP',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurVille', TextType::class, [
                'required' => false,
                'label' => 'Vendeur Ville',
                'attr' => [
                    'placeholder' => 'Vendeur Ville',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurPays', TextType::class, [
                'required' => false,
                'label' => 'Vendeur Pays',
                'attr' => [
                    'placeholder' => 'Vendeur Pays',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurTelephoneSociete', TelType::class, [
                'required' => false,
                'label' => 'Vendeur Téléphone Societé',
                'attr' => [
                    'placeholder' => 'Vendeur Téléphone Societé',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurFaxSociete', TelType::class, [
                'required' => false,
                'label' => 'Vendeur Fax Societe',
                'attr' => [
                    'placeholder' => 'Vendeur Fax Societe',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurRCS', TextType::class, [
                'required' => false,
                'label' => 'Vendeur RCS',
                'attr' => [
                    'placeholder' => 'Vendeur RCS',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurCapital', TextType::class, [
                'required' => false,
                'label' => 'Vendeur Capital',
                'attr' => [
                    'placeholder' => 'Vendeur Capital',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurNomDirigeant', TextType::class, [
                'required' => false,
                'label' => 'Vendeur Nom Dirigeant',
                'attr' => [
                    'placeholder' => 'Vendeur Nom Dirigeant',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurTelPortable', TelType::class, [
                'required' => false,
                'label' => 'Vendeur Tel Portable',
                'attr' => [
                    'placeholder' => 'Vendeur Tel Portable',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurTelPerso', TelType::class, [
                'required' => false,
                'label' => 'Vendeur Tel Perso',
                'attr' => [
                    'placeholder' => 'Vendeur Tel Perso',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurEmail', EmailType::class, [
                'required' => false,
                'label' => 'Vendeur Email',
                'attr' => [
                    'placeholder' => 'Vendeur Email',
                    'class' => 'form-control',
                ]
            ])
            ->add('VendeurDateNaissance', DateType::class, [
                'required' => false,
                'label' => 'Vendeur Date Naissance',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Vendeur Date Naissance',
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('VendeurAdresseFondsVendu', ChoiceType::class, [
                'required' => false,
                'label' => 'Vendeur Adresse Fonds Vendu',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Vendeur Adresse Fonds Vendu',
                    'class' => 'form-control',
                ]
            ])
            ->add('ActiviteFdsCommerce', TextType::class, [
                'required' => false,
                'label' => 'Activite Fds Commerce',
                'attr' => [
                    'placeholder' => 'Activite Fds Commerce',
                    'class' => 'form-control',
                ]
            ])
            ->add('DateActeCession', DateType::class, [
                'required' => false,
                'label' => 'Date Acte Cession',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Date Acte Cession',
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('PrixVente', NumberType::class, [
                'required' => false,
                'label' => 'Prix Vente',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Prix Vente',
                    'readonly' => ""
                ]
            ])
            ->add('Tresorerie', NumberType::class, [
                'required' => false,
                'label' => 'Tresorerie',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Tresorerie',
                    'readonly' => ""
                ]
            ])
            ->add('ReportDeficitaire', NumberType::class, [
                'required' => false,
                'label' => 'Report Deficitaire',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Report Deficitaire',
                    'readonly' => ""
                ]
            ])
            ->add('Immobilier', TextType::class, [
                'required' => false,
                'label' => 'Immobilier',
                'attr' => [
                    'placeholder' => 'Immobilier',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurRaisonSociale', TextType::class, [
                'required' => false,
                'label' => 'Acheteur Raison Sociale',
                'attr' => [
                    'placeholder' => 'Acheteur Raison Sociale',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurAdresse', TextType::class, [
                'required' => false,
                'label' => 'Acheteur Adresse',
                'attr' => [
                    'placeholder' => 'Acheteur Adresse',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurCP', TextType::class, [
                'required' => false,
                'label' => 'Acheteur CP',
                'attr' => [
                    'placeholder' => 'Acheteur CP',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurVille', TextType::class, [
                'required' => false,
                'label' => 'Acheteur Ville',
                'attr' => [
                    'placeholder' => 'Acheteur Ville',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurPays', TextType::class, [
                'required' => false,
                'label' => 'Acheteur Pays',
                'attr' => [
                    'placeholder' => 'Acheteur Pays',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurTelephone', TelType::class, [
                'required' => false,
                'label' => 'Acheteur Telephone',
                'attr' => [
                    'placeholder' => 'Acheteur Telephone',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurFax', TelType::class, [
                'required' => false,
                'label' => 'Acheteur Fax',
                'attr' => [
                    'placeholder' => 'Acheteur Fax',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurRCS', TextType::class, [
                'required' => false,
                'label' => 'Acheteur RCS',
                'attr' => [
                    'placeholder' => 'Acheteur RCS',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurCapital', NumberType::class, [
                'required' => false,
                'label' => 'Acheteur Capital',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Acheteur Capital',
                    'readonly' => ""
                ]
            ])
            ->add('AcheteurNomDirigeant', TextType::class, [
                'required' => false,
                'label' => 'Acheteur Nom Dirigeant',
                'attr' => [
                    'placeholder' => 'Acheteur Nom Dirigeant',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurTelPortable', TelType::class, [
                'required' => false,
                'label' => 'Acheteur Tel Portable',
                'attr' => [
                    'placeholder' => 'Acheteur Tel Portable',
                    'class' => 'form-control',
                ]
            ])
            ->add('AcheteurDateNaissance', DateType::class, [
                'required' => false,
                'label' => 'Acheteur Date Naissance',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'attr' => [
                    'placeholder' => 'Acheteur Date Naissance',
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Societe::class,
        ]);
    }
}
