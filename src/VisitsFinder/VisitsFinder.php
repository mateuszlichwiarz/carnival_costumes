<?php

namespace App\VisitsFinder;

use App\Entity\Visits;

use App\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use App\VisitsFinder\VisitsFinderInterface;

use App\VisitsFinder\Factory\WeekVisitsFinderFactory;
use App\VisitsFinder\Factory\MonthVisitsFinderFactory;
use App\VisitsFinder\Factory\YearVisitsFinderFactory;

use App\Date\Entity\Date;
use Symfony\Component\DependencyInjection\Attribute\Target;

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

    public function setup(array $visitsCollection, ?Date $date = null): void
    {
        $this->visitsCollection = $visitsCollection;
        $this->date = $date;
    }
    
    public function findWeek(): Visits
    {
        if(!is_null($this->visitsCollection)) {
            $finder = $this->weekVisitsFinderFactory->createFinder(
                $this->date,
                $this->visitsCollection,
            );
            return $finder->find();
        }else {
            throw new \Exception('no visits provided');
        }
    }

    public function findMonth(): array
    {
        if(!is_null($this->visitsCollection)) {
            $finder = $this->monthVisitsFinderFactory->createFinder(
                $this->date,
                $this->visitsCollection,
            );
            return $finder->find();
        }else {
            throw new \Exception('no visits provided');
        }
    }

    public function findYear(): array
    {
        if(!is_null($this->visitsCollection)) {
            $finder = $this->yearVisitsFinderFactory->createFinder(
                $this->date,
                $this->visitsCollection,
            );
            return $finder->find();
        }else {
            throw new \Exception('no visits provided');
        }
    }
}