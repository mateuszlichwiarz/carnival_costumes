<?php

declare(strict_types=1);

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;

class UpdateOpenHoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Day', ChoiceType::class, [
                'choices' => [
                    'Monday'    => 'Monday',
                    'Tuesday'   => 'Tuesday',
                    'Wednesday' => 'Wednesday',
                    'Thursday'  => 'Thursday',
                    'Friday'    => 'Friday',
                    'Saturday'  => 'Saturday',
                    'Sunday'    => 'Sunday'
                ]
            ])
            ->add('isClosed', CheckboxType::class)
            ->add('Start', TimeType::class)
            ->add('End', TimeType::class)
            ->add('update', SubmitType::class)
        ;
    }
}