<?php

namespace App\Form;

use App\Entity\Measurement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('neck')
            ->add('shoulderWidth')
            ->add('bust')
            ->add('waist')
            ->add('rise')
            ->add('hips')
            ->add('thigh')
            ->add('knee')
            ->add('calf')
            ->add('inseam')
            ->add('outseam')
            ->add('backLength')
            ->add('sleeveLength')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
