<?php

namespace App\Admin;

use App\Entity\Point;
use App\Entity\ServiceLocator;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

final class TripAdmin extends AbstractAdmin {

    protected function configureFormFields(FormMapper $form): void
    {
        $form
            ->add('pickupPoint', EntityType::class, [
                'class' => Point::class,
                'choice_label' => 'name',
            ])
            ->end()
            ->add('destinationPoint', EntityType::class, [
                'class' => Point::class,
                'choice_label' => 'name',
            ])
            ->end()
            ->add('serviceLocator', EntityType::class, [
                'class' => ServiceLocator::class,
                'choice_label' => 'name',
            ])
            ->end()
            ->add('typeVehicle', ChoiceFieldMaskType::class, [
                'choices' => [
                    'coche'     => 'coche',
                    'furgoneta' => 'furgoneta',
                    'compartido'=> 'compartido'
                ]
            ])
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $list): void
    {
        $list->addIdentifier('id');
        $list->addIdentifier('pickupPoint.name');
        $list->addIdentifier('destinationPoint.name');
        $list->addIdentifier('serviceLocator.name');
    }

    public function toString(object $object): string
    {
        return $object instanceof \App\Entity\Trip
            ? $object->getId()
            : 'Trip';
    }


}