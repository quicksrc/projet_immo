<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('DateModification')
            ->add('Civilite')
            ->add('Nom')
            ->add('Prenom')
            ->add('Societe')
            ->add('Correspondant')
            ->add('Adresse')
            ->add('CP')
            ->add('Ville')
            ->add('Pays')
            ->add('Telephone')
            ->add('Fax')
            ->add('TelephonePortable')
            ->add('TelephoneDomicile')
            ->add('ListeRouge')
            ->add('Email')
            ->add('DateNaissance')
            ->add('Activite')
            ->add('RCS')
            ->add('AntiMailing')
            ->add('NPAI')
            ->add('Commentaire')
            ->add('Fonction')
            ->add('DCD')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
