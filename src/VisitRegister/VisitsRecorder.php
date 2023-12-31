<?php

declare(strict_types=1);

namespace App\VisitRegister;

use App\VisitRegister\VisitFactory;
use App\VisitRegister\VisitsUpdater;
use App\VisitRegister\Persister\VisitPersister;
use App\Repository\VisitsRepository;

use App\Date\Date;
use App\Date\CurrentDate\CurrentDateFactory;

class VisitsRecorder
{
    private Date $date;

    public function __construct(
        private VisitsRepository $visitsRepository,
        private VisitFactory $visitFactory,
        private VisitsUpdater $visitsUpdater,
        private VisitPersister $visitPersister,
        private CurrentDateFactory $currentDateFactory,
    ){
        $this->date = $this->currentDateFactory->createDate();
    }

    public function saveVisit(): void
    {
        $visitFound = $this->visitsRepository->
            findOneVisitByDate(
                $this->date->getWeek(),
                $this->date->getMonth(),
                $this->date->getYear()
            )
        ;
        if(!$visitFound) {
            $visit = $this->visitFactory->create($this->date);
        }else {
            $visit = $this->visitsUpdater->updateVisits($visitFound);
        }
        $this->visitPersister->persist($visit);
    }
}