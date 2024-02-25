<?php

declare(strict_types=1);

namespace App\Form\Contact;

use Symfony\Component\Form\FormInterface;

interface ContactUpdateFormInterface
{
    public function createForms(): void;

    public function handleRequest();

    public function viewAddressForm(): FormInterface;

    public function viewPhoneForm(): FormInterface;

    public function getContact();
}