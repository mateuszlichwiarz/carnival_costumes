<?php

declare(strict_types=1);

namespace App\VisitRegister;

use App\Entity\Visits;

class VisitsUpdater
{
    public function updateVisits(Visits $visit): Visits
    {
        $visit->setVisits($visit->getVisits()+1);
        return $visit;
    }
}