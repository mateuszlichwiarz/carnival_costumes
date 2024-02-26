<?php

declare(strict_types=1);

namespace App\Form\Contact;

use App\Entity\Contact;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

interface ContactUpdateFormInterface
{
    public function createForms(): void;

    public function handleRequest(Request $request): Contact|null;

    public function viewAddressForm(): FormInterface;

    public function viewPhoneForm(): FormInterface;
}