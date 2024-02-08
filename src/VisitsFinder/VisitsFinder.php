<?php

namespace App\VisitsFinder;

use App\Entity\Visits;

use App\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use App\VisitsFinder\VisitsFinderInterface;
use App\Date\Entity\Date;

class VisitsFinder implements VisitsFinderInterface
{
    private ?Date $date = null;

    private ?array $visitsCollection = null;

    public function __construct(
        private VisitsFinderFactoryInterface $weekVisitsFinderFactory,
        private VisitsFinderFactoryInterface $monthVisitsFinderFactory,
        private VisitsFinderFactoryInterface $yearVisitsFinderFactory,
    )
    {}

    public function prepare(array $visitsCollection): void
    {
        $this->visitsCollection = $visitsCollection;
    }
    
    public function findWeek(Date $date): Visits
    {
        if(!is_null($this->visitsCollection)) {
            return $this->weekVisitsFinderFactory->createFinder(
                $this->date,$this->visitsCollection
                )->find();
        }else {
            throw new \Exception('no visits provided');
        }
    }

    public function findMonth(Date $date): array
    {
        if(!is_null($this->visitsCollection)) {
            return $this->monthVisitsFinderFactory->createFinder(
                $this->date, $this->visitsCollection
                )->find();
        }else {
            throw new \Exception('no visits provided');
        }
    }

    public function findYear(Date $date): array
    {
        if(!is_null($this->visitsCollection)) {
            return $this->yearVisitsFinderFactory->createFinder(
                $this->date, $this->visitsCollection)->find();
        }else {
            throw new \Exception('no visits provided');
        }
    }
}