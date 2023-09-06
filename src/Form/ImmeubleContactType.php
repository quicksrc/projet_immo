<?php

namespace App\Form;

use App\Entity\Civilite;
use App\Entity\Contact;
use App\Entity\Immeuble;
use App\Entity\ImmeubleContact;
use App\Entity\Qualite;
use App\Entity\QualiteProprietaire;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmeubleContactType extends AbstractType
{
    public $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
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
            ])
            ->add('IDContact', IntegerType::class, [
                'required' => true,
                'label' => 'ID Contact',
                'attr' => [
                    'class' => 'form-control',
                ],
                // 'class' => Contact::class,
                // 'choice_label' => 'Nom'
            ])
            ->add('Qualite', EntityType::class, [
                'required' => true,
                'label' => 'Qualité',
                'attr' => [
                    'class' => 'form-control',
                    'readonly' => true,
                ],
                'class' => Qualite::class,
                'choice_label' => 'libelle',
            ])
            ->add('QualiteProprietaire', EntityType::class, [
                'required' => true,
                'label' => 'Qualité Propriétaire',
                'attr' => [
                    'class' => 'form-control',
                    'readonly' => true,
                ],
                'class' => QualiteProprietaire::class,
                'choice_label' => 'libelle',
            ])
            ->add('Genre', EntityType::class, [
                'required' => true,
                'label' => 'Civilite',
                'attr' => [
                    'class' => 'form-control',
                    'readonly' => true,
                ],
                'class' => Civilite::class,
                'choice_label' => 'libelle',
            ])
            ->add('Principal', ChoiceType::class, [
                'required' => false,
                'label' => 'Contact Principal',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Contact Principal',
                    'class' => 'form-control',
                ]
            ])
            ->add('NeVendPas', ChoiceType::class, [
                'required' => false,
                'label' => 'Ne vend pas',
                'choices' => [
                    'Ne vend pas' => 1,
                    'Vend' => 0
                ],
                'attr' => [
                    'placeholder' => 'Ne vend pas',
                    'class' => 'form-control',
                ]
            ])
            ->add('DateNVP', DateType::class, [
                'required' => false,
                'label' => 'Date NVP',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'data' => new \DateTime(),
                'attr' => [
                    'class' => 'form-control js-datepicker',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ImmeubleContact::class,
        ]);
    }
}