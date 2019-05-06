<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class, [
                'label' => "Titre de l'événement :"
            ])
            ->add('description', TextType::class, [
                ' label ' => "Résumé sommairede l'événement :"
            ])
            ->add('corps', TextType::class, [
                ' label ' => "Informations complètes de l'événement :"
            ])
            ->add('createAt')
            ->add('updateAt');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
            'translations_domaine' => 'evenementForm',
        ]);
    }
}
