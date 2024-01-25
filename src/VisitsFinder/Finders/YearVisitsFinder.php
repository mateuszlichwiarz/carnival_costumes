<?php

declare(strict_types=1);

namespace App\VisitsFinder\Finders;

use App\VisitsFinder\Finders\Interface\ManyResultsVisitsFinderInterface as VisitsFinderInterface;

use App\Date\Date;

final class YearVisitsFinder implements VisitsFinderInterface
{
    public function __construct(
        private Date $date,
        private array $visitsCollection,
    ){}
    
    public function find(): array
    {
        foreach($this->visitsCollection as $visit) {
            if($this->date->getYear() === $visit->getYear()
             ) {
                $foundedVisits[] = $visit;
            }
        }
        return $foundedVisits;
    }
}