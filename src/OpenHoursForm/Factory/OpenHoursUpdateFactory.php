<?php

declare(strict_types=1);

namespace App\OpenHoursForm\Factory;

use App\Entity\OpenHours;

use App\OpenHoursForm\Factory\OpenHoursUpdateFactoryInterface;

class OpenHoursUpdateFactory implements OpenHoursUpdateFactoryInterface
{
    public function createUpdate(
        OpenHours $foundOpenHours,
        OpenHours $formOpenHours
        ): OpenHours 
    {
        return $foundOpenHours
            ->setIsClosed($formOpenHours->getIsClosed())
            ->setStartDate($formOpenHours->getStartDate())
            ->setEndDate($formOpenHours->getEndDate())
        ;
    }
}