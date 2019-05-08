<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => "Titre de l'événement :"
            ])
            ->add('dateDebutEvent')
            ->add('dateFinEvent')
            ->add('description')
            ->add('corps');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
            'translations_domaine' => 'evenementForm',
        ]);
    }
}
