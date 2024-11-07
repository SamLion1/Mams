<?php

namespace App\Form;

use App\Entity\Trips;
use App\Entity\User;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TripsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('tripDate', null, [
                'widget' => 'single_text',
                'label'  => 'date'
            ])
            ->add('origin', null, [
                'label' => 'origin'
            ])
            ->add('destination', null, [
                'label' => 'destination'
            ])
            ->add('mileage' , null, [
                'label' => 'mileage'
            ])
            ->add('unit' , ChoiceType::class, [
                'choices' => [
                    'miles' => 'miles',
                    'kilomètres' => 'kilomètres',
                ],
                'label' => 'unit'
            ])
            ->add('context',  null, [
                'label' => 'context'
            ])

            ->add('category', null, [
                'label' => 'category'
            ])
            ->add('description',    null, [
                'label' => 'description'
            ])
            ->add('billableClient', null, [
                'label' => 'billable_client'
            ])
            ->add('User', EntityType::class, [
                'label' => 'user',
                'class' => User::class,
                'choice_label' => function (User $user) {
                    return $user->getLastname() . ' ' . $user->getFirstname();
                },
            ])
            ->add('Vehicle', EntityType::class, [
                'label' => 'vehicle',
                'class' => Vehicle::class,
                'choice_label' => 'label',
                'multiple' => true,
            ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Trips::class,
        ]);
    }
}
