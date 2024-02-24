<?php

declare(strict_types=1);

namespace App\Form\OpenHours\Factory;

use App\Entity\OpenHours;

use App\Form\OpenHours\Factory\OpenHoursUpdateFactoryInterface;

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