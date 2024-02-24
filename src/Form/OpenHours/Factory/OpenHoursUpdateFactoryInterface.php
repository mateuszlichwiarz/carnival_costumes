<?php

declare(strict_types=1);

namespace App\Form\OpenHours\Factory;

use App\Entity\OpenHours;

interface OpenHoursUpdateFactoryInterface
{
    public function createUpdate(OpenHours $foundOpenHours, OpenHours $formOpenHours): openHours;
}