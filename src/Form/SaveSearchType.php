<?php

namespace App\Form;

use App\Entity\RechercheImmeuble;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SaveSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomRecherche', ChoiceType::class, [
                'required' => false,
                'label' => 'Recherches Sauvegardées',
                'label_attr' => [
                    'class' => 'form-label mt-4'
                ],
                'choices' => [
                    function (?RechercheImmeuble $rechercheImmeuble): string {
                        return $rechercheImmeuble->getNomRecherche();
                    },
                ],
                'attr' => [
                    'class' => 'form-select',
                ]
            ])
            ->add('searchSaved', SubmitButton::class, [
                'label' => 'Rechercher',
                'attr' => [
                    'class' => 'btn btn-primary mt-5 mb-1'
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
