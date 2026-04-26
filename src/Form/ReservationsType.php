<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Range;

class ReservationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Full_name')
            ->add('email')
            ->add('Phone_number')
            ->add('date')
            ->add('private_dining')
            ->add('Time_slot')
            ->add('Party_size', IntegerType::class, [
                'constraints' => [
                    new Range(min: 1, max: 10)
                ]
            ])
            ->add('Special_requests')
        ;

        $builder->addEventListener(FormEvents::PRE_SUBMIT, function (FormEvent $event) {
            $data = $event->getData();
            $form = $event->getForm();

            $isPrivateDining = !empty($data['private_dining']);

            if ($isPrivateDining) {
                $form->add('Party_size', IntegerType::class, [
                    'constraints' => [
                        new Range(min: 6, max: 12)
                    ]
                ]);
            } else {
                $form->add('Party_size', IntegerType::class, [
                    'constraints' => [
                        new Range(min: 1, max: 10)
                    ]
                ]);
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
