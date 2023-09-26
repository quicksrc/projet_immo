<?php

namespace App\Form;

use App\Entity\Description;
use App\Entity\Enquete;
use App\Entity\Immeuble;
use App\Entity\OrigineContactImmeuble;
use App\Entity\SuiviPar;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Image;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use Symfony\Component\HttpFoundation\RequestStack;
use Webmozart\Assert\Assert;

class ImmeubleType extends AbstractType
{
    public $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('ReferenceProprio', NumberType::class, [
                'required' => false,
                'label' => 'Réf. propriétaire',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Réf. propriétaire',
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
                    'À classer' => 'A classer',
                    'À visiter' => 'A visiter'
                ],
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Etat Dossier'
                ]
            ])
            // ->add('origineContact', EntityType::class, [
            //     'required' => false,
            //     'mapped' => false,
            //     'label' => 'Origine Contact',
            //     'attr' => [
            //         'class' => 'form-control',
            //     ],
            //     'class' => OrigineContactImmeuble::class,
            //     'choice_label' => 'libelle',
            //     'choice_value' => 'libelle'
            // ])
            ->add('Enquete', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Enquête',
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => Enquete::class,
                'choice_label' => 'libelle',
                'choice_value' => 'libelle'
            ])
            ->add('DateEnquete', DateType::class, [
                'required' => false,
                'label' => 'Date de l\'enquête',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'data' => new \DateTime(),
                'attr' => [
                    'class' => 'form-control js-datepicker',
                ]
            ])
            ->add('SuiviPar', EntityType::class, [
                'mapped' => false,
                'label' => 'Suivi Par',
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => SuiviPar::class,
                'choice_label' => 'libelle',
                'choice_value' => 'libelle',
                'multiple' => false,
                'required' => false
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
            ->add('Description', EntityType::class, [
                'required' => false,
                'mapped' => false,
                'label' => 'Description',
                'attr' => [
                    'class' => 'form-control',
                ],
                'class' => Description::class,
                'choice_label' => 'libelle',
                'choice_value' => 'libelle'
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
            ->add('OrigineContact', EntityType::class, [
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
            ->add('images', FileType::class, [
                'required' => false,
                'label' => 'Images',
                'attr' => [
                    'class' => 'form-control',
                    'multiple' => 'multiple'
                ],
                // 'constraints' => [
                //     new Image([
                //         'mimeTypes' => [
                //             'image/png',
                //             'image/jpg',
                //             'image/jpeg',
                //             'image/gif',
                //         ],
                //         'mimeTypesMessage' => 'Please upload a valid image',
                //     ])
                // ],
                'data_class' => null,
                'multiple' => true,
                'mapped' => false
            ])
            ->add('documents', FileType::class, [
                'required' => false,
                'label' => 'Documents',
                'attr' => [
                    'class' => 'form-control',
                    'multiple' => 'multiple'
                ],
                // 'constraints' => [
                //     new File([
                //         'mimeTypes' => [
                //             'application/pdf',
                //         ],
                //         'mimeTypesMessage' => 'Please upload a valid image',
                //     ])
                // ],
                'data_class' => null,
                'multiple' => true,
                'mapped' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Immeuble::class,
        ]);
    }
}
