<?php

declare(strict_types=1);

namespace App\OpenHoursForm\Factory;

use App\Entity\OpenHours;

use App\OpenHoursForm\Factory\OpenHoursUpdateFactoryInterface;

class OpenHoursUpdateFactory implements OpenHoursUpdateFactoryInterface
{
    public function createUpdate(openHours $openHours): OpenHours
    {
        return $openHours
            ->setIsClosed($openHours->getIsClosed())
            ->setStartDate($openHours->getStartDate())
            ->setEndDate($openHours->getEndDate())
        ;
    }
}