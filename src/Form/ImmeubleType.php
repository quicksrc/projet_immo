<?php

namespace App\Form;

use App\Entity\Immeuble;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImmeubleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DateEnquete')
            ->add('ReferenceProprio')
            ->add('NumPlancheCadastrale')
            ->add('SMS')
            ->add('EtatDossier')
            ->add('Enquete')
            ->add('NomGardien')
            ->add('Description')
            ->add('SuiviPar')
            ->add('Vendu')
            ->add('DateVente')
            ->add('OrigineContact')
            ->add('Intermediaire')
            ->add('NCPCF')
            ->add('Visite')
            ->add('Commentaire')
            ->add('NumPrincipal')
            ->add('NumSecondaire')
            ->add('TypeVoie')
            ->add('NomRue')
            ->add('Adresse')
            ->add('CP')
            ->add('Ville')
            ->add('ContactPrincipal')
            ->add('Photo1')
            ->add('Photo2')
            ->add('DateVisite')
            ->add('RegroupementAct')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Immeuble::class,
        ]);
    }
}
