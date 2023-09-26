<?php

namespace App\Form;

use App\Entity\RechercheImmeuble;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaveSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomRecherche', EntityType::class, [
                'required' => false,
                'label' => 'Recherche sauvegardée',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'class' => RechercheImmeuble::class,
                'attr' => [
                    'class' => 'form-select sm-3',
                ],
                'query_builder' => function (EntityRepository $er): QueryBuilder {
                    return $er->createQueryBuilder('r')
                        ->orderBy('r.id', 'ASC');
                },
                'choice_label' => 'nomRecherche',
            ])
            ->add('searchSaved', SubmitType::class, [
                'label' => 'Rechercher',
                'attr' => [
                    'class' => 'btn btn-primary mt-1'
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
