<?php

namespace App\Form;

use App\Entity\Measurement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('neck', NumberType::class, [
                'required'   => false,
            ])
            ->add('shoulderWidth', NumberType::class, [
                'required'   => false,
            ])
            ->add('bust', NumberType::class, [
                'required'   => false,
            ])
            ->add('waist', NumberType::class, [
                'required'   => false,
            ])
            ->add('rise', NumberType::class, [
                'required'   => false,
            ])
            ->add('hips', NumberType::class, [
                'label' => 'Tour de hanches',
                'required'   => false,
            ])
            ->add('thigh', NumberType::class, [
                'label' => 'Tour de cuisse',
                'required'   => false,
            ])
            ->add('knee', NumberType::class, [
                'label' => 'Hauteur de genou',
                'required'   => false,
            ])
            ->add('calf', NumberType::class, [
                'required'   => false,
            ])
            ->add('inseam', NumberType::class, [
                'required'   => false,
            ])
            ->add('outseam', NumberType::class, [
                'required'   => false,
            ])
            ->add('backLength', NumberType::class, [
                'required'   => false,
            ])
            ->add('sleeveLength', NumberType::class, [
                'required'   => false,
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
                'attr' => ['class' => 'btn btn-secondary'],
            ])
            ->getForm();
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
