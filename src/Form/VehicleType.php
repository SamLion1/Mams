<?php

namespace App\Form;

use App\Entity\Trips;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Label' , null, [
                'label' => 'Marque'
            ])
            ->add('model' , null, [
                'label' => 'Modèle'
            ])
            ->add('plate' , null,  [
                'label' => 'Immatriculation'
            ])
            ->add('fiscal_power' , null, [
                'label' => 'Puissance Fiscale'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
