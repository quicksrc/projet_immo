<?php

namespace App\Form;

use App\Entity\Opportunite;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Doctrine\ORM\QueryBuilder as ORMQueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\RequestStack;
use App\Entity\Immeuble;

class OpportuniteType extends AbstractType

{

    public $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Date', DateType::class, [
                'required' => false,
                'label' => 'Date',
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd 00:00:00',
                'html5' => false,
                'data' => new \DateTime(),
                'attr' => [
                    'placeholder' => 'Date',
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
            ->add('SocieteConcernee', ChoiceType::class, [
                'required' => false,
                'label' => 'Societe Concernee',
                'choices' => [
                    'VG - Non Retenu' => 'VG - Non Retenu',
                    'VG - Nommé' => 'VG - Nommé',
                    'Valorim Gestion' => 'Valorim Gestion',
                ],
                'attr' => [
                    'placeholder' => 'Societe Concernee',
                    'class' => 'form-control',
                ]
            ])
            ->add('Gerance', ChoiceType::class, [
                'required' => false,
                'label' => 'Gerance',
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0
                ],
                'attr' => [
                    'placeholder' => 'Gerance',
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
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Opportunite::class,
        ]);
    }
}
