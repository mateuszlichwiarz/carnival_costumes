<?php

declare(strict_types=1);

namespace App\OpenHoursForm\DataContainer;

use App\Entity\OpenHours;

interface OpenHoursDataContainerInterface
{
    public function getAllDays(): array;

    public function getOpenHoursDay(int $day): OpenHours|null;
}