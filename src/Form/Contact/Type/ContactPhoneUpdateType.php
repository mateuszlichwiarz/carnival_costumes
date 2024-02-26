<?php

declare(strict_types=1);

namespace App\Form\Contact\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactPhoneUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Phone', TelType::class, [
                'label' => 'Phone number'
            ])
            ->add('Set', SubmitType::class)
        ;
    }
}