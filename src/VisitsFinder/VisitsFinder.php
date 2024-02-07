<?php

namespace App\VisitsFinder;

use App\Entity\Visits;

use App\VisitsFinder\Factory\VisitsFinderFactoryInterface;
use App\VisitsFinder\VisitsFinderInterface;

use App\VisitsFinder\Factory\WeekVisitsFinderFactory;
use App\VisitsFinder\Factory\MonthVisitsFinderFactory;
use App\VisitsFinder\Factory\YearVisitsFinderFactory;

use App\Date\Entity\Date;

class VisitsFinder implements VisitsFinderInterface
{
    private ?Date $date = null;

    private ?array $visitsCollection = null;

    public function __construct(
        private VisitsFinderFactoryInterface $visitsFinderFactory,
    )
    {}

    public function setup(array $visitsCollection, ?Date $date = null): void
    {
        $this->visitsCollection = $visitsCollection;
        $this->date = $date;
    }
    
    public function findWeek(): Visits
    {
        if(!is_null($this->visitsCollection)){
            $finder = $this->visitsFinderFactory->createFinder(
                $this->date,
                $this->visitsCollection,
            );
            return $finder->find();
        }else{
            throw new \Exception('no visits provided');
        }
    }
}