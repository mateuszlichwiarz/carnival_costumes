<?php

declare(strict_types= 1);

namespace App\VisitRegister;

use App\Entity\Visits;

use App\Date\Date;

class VisitFactory
{
    public function create(Date $date): Visits
    {

        $visit = new Visits();
        $visit->setMonth($date->getMonth());
        $visit->setWeek($date->getWeek());
        $visit->setYear($date->getYear());
        $visit->setVisits(1);

        return $visit;
    }
}