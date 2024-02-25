<?php

declare(strict_types=1);

namespace App\Form\Contact;

interface ContactUpdateFormInterface
{
    public function createForms(): void;

    public function handleRequest();

    public function viewForms();

    public function getContact();
}