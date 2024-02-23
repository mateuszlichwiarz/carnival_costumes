<?php

declare(strict_types=1);

namespace App\OpenHoursForm\Factory;

use App\Entity\OpenHours;

interface OpenHoursUpdateFactoryInterface
{
    public function createUpdate(OpenHours $form): openHours;
}