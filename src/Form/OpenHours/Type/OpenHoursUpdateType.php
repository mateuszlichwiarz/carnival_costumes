<?php

declare(strict_types=1);

namespace App\Form\OpenHours\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class OpenHoursUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('day', ChoiceType::class, [
                'choices' => [
                    'Monday'    => 1,
                    'Tuesday'   => 2,
                    'Wednesday' => 3,
                    'Thursday'  => 4,
                    'Friday'    => 5,
                    'Saturday'  => 6,
                    'Sunday'    => 7
                ]
            ])
            ->add('isClosed', CheckboxType::class, [
                'label'    => 'Closed day?',
                'required' => false,
            ])
            ->add('startDate', TimeType::class, [
                'widget' => 'choice',
                'label' => 'Start time'
            ])
            ->add('endDate', TimeType::class, [
                'widget' => 'choice',
                'label' => 'End time'
            ])
            ->add('set', SubmitType::class)
        ;
    }
}