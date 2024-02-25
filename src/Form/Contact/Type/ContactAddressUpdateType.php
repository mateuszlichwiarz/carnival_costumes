<?php

declare(strict_types=1);

namespace App\Form\Contact\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ContactAddressUpdateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('City', TextType::class)
            ->add('Street', TextType::class)
            ->add('Set', SubmitType::class)
        ;
    }
}