<?php

namespace App\Form;

use App\Entity\Activite;
use App\Entity\Immeuble;
use Doctrine\Common\Collections\Expr\Value;
use Doctrine\DBAL\Query\QueryBuilder;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class ActiviteType extends AbstractType
{
    public $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

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
            ])
            ->add('IDImmeuble', EntityType::class, [
                'required' => true,
                'label' => 'ID Immeuble',
                'attr' => [
                    'class' => 'form-control',
                    'readonly' => true,
                ],
                'class' => Immeuble::class,
                'query_builder' => function (EntityRepository $er): ORMQueryBuilder {
                    $request = $this->requestStack->getCurrentRequest();
                    return $er->createQueryBuilder('i')
                        ->where('i.IDImmeuble = ' . $request->query->get('immeuble'));
                }
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
