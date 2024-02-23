<?php

declare(strict_types=1);

namespace App\OpenHoursForm\Resolver;

use App\Entity\OpenHours;

interface OpenHoursUpdateResolverInterface
{
    public function resolve(OpenHours $formData): OpenHours;
}