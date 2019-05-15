<?php

namespace App\Form;

use App\Entity\Event;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('startDateEvent')
            ->add('endDateEvent')
            ->add('description')
            ->add('body')
            ->add('city')
            ->add('address')
            ->add('zip_code')
            ->add('lat', HiddenType::class)
            ->add('lng', HiddenType::class)
            ->add('pictureFiles', FileType::class, [
                'required' => \false,
                'multiple' => \true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Event::class,
            'translations_domaine' => 'eventForm',
        ]);
    }
}
