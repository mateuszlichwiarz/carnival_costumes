<?php

declare(strict_types=1);

namespace App\VisitsFinder\Finders;

use App\VisitsFinder\Finders\Interface\OneResultVisitsFinderInterface as VisitsFinderInterface;

use App\Date\Entity\Date;

use App\Entity\Visits;

final class WeekVisitsFinder implements VisitsFinderInterface
{
    public function __construct(
        private Date $date,
        private array $visitsCollection,
    ){}

    public function find(): Visits
    {
        foreach($this->visitsCollection as $visit) {
            if($this->date->getYear()  === $visit->getYear() &&
               $this->date->getMonth() === $visit->getMonth() &&
               $this->date->getWeek()  === $visit->getWeek()
             ) {
                $foundedVisits = $visit;
            }
        }
        return $foundedVisits;
    }
}