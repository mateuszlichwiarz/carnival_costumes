<?php

declare(strict_types=1);

namespace App\Form\OpenHours;

use App\Entity\OpenHours;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

interface OpenHoursFormInterface
{
    public function createForm(): void;

    public function handleRequest(Request $request): OpenHours|null;

    public function viewForm(): FormInterface;
}