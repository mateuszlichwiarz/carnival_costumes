<?php

declare(strict_types=1);

namespace App\OpenHours;

use App\Entity\OpenHours;


class OpenHoursUpdater
{
    public function update(openHours $openHours): OpenHours
    {
        return $openHours
            ->setIsClosed($openHours->getIsClosed())
            ->setStartDate($openHours->getStartDate())
            ->setEndDate($openHours->getEndDate())
        ;
    }
}