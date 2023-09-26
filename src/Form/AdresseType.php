<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\Immeuble;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\RequestStack;

class AdresseType extends AbstractType
{
    public $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
                    'placeholder' => 'N° Secondaire',
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
                'label' => 'CP',
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
            ->add('AdressePrincipale', ChoiceType::class, [
                'required' => false,
                'label' => 'Adresse Principale',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Adresse Principale',
                    'class' => 'form-control',
                ]
            ]);
        // ->add('IDImmeuble', EntityType::class, [
        //     'required' => false,
        //     'mapped' => false,
        //     'label' => 'ID Immeuble',
        //     'attr' => [
        //         'class' => 'form-control',
        //         'readonly' => true,
        //     ],
        //     'class' => Immeuble::class,
        //     // 'query_builder' => function (EntityRepository $er): ORMQueryBuilder {
        //     //     $request = $this->requestStack->getCurrentRequest();
        //     //     return $er->createQueryBuilder('i')
        //     //         ->where('i.IDImmeuble = ' . $request->query->get('immeuble'));
        //     // }
        // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
        ]);
    }
}
