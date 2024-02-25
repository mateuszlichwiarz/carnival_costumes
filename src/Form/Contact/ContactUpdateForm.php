<?php

declare(strict_types=1);

namespace App\Form\Contact;

use App\Entity\Contact;

use App\Form\Contact\ContactUpdateFormInterface;
use App\Form\Contact\Type\ContactAddressUpdateType;
use App\Form\Contact\Type\ContactPhoneUpdateType;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class ContactUpdateForm implements ContactUpdateFormInterface
{

    private Contact $contactPhone;

    private Contact $contactAddress;

    private FormInterface $formAddress;

    private FormInterface $formPhone;

    public function __construct(
        private FormFactoryInterface $formFactory,
    ){}

    public function createForms(): void
    {
        $this->contactAddress = new Contact();

        $this->formAddress = $this->formFactory->create(
            ContactAddressUpdateType::class,
            $this->contactAddress
        );

        $this->contactPhone = new Contact();

        $this->formPhone = $this->formFactory->create(
            ContactPhoneUpdateType::class,
            $this->contactPhone
        );
    }
}