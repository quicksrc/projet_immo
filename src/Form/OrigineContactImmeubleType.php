<?php

namespace App\Form;

use App\Entity\OrigineContactImmeuble;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrigineContactImmeubleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Libelle', TextType::class, [
                'required' => false,
                'label' => 'Libelle',
                'attr' => [
                    'placeholder' => 'Libelle',
                    'class' => 'form-control',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OrigineContactImmeuble::class,
        ]);
    }
}
