<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('order', ChoiceType::class, [
                'label' => 'Order by date',
                'choices' => [
                    'Upcoming first' => 'ASC',
                    'Upcoming last' => 'DESC',
                ],
                'required' => true,
                'data' => 'ASC',
            ])
            ->add('date', DateType::class, [
                'label' => 'Filter by date',
                'widget' => 'single_text',
                'required' => false,
            ])
            ->add('status', ChoiceType::class, [
                'label' => 'Filter by status',
                'choices' => [
                    'All' => null,
                    'Pending' => 'Pending',
                    'Confirmed' => 'Confirmed',
                    'Cancelled' => 'Cancelled',
                    'Completed' => 'Completed',
                ],
                'required' => false,
                'placeholder' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }
}
