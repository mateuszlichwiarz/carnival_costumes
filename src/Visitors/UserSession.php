<?php

declare(strict_types=1);

namespace App\Visitors;

use App\Entity\Visits;

use Symfony\Component\HttpFoundation\RequestStack;

use App\Date\DateFormat;
use App\Visitors\Persister\VisitPersister;

class UserSession
{
    private $session;

    public function __construct(
        private RequestStack $requestStack, 
        private VisitPersister $visitPersister,
        private DateFormat $dateFormat
    ){
        $this->session = $this->requestStack->getSession();
    }

    public function storeSession(): void
    {
        $visit = new Visits();
        $visit->setMonth($this->dateFormat->getMonth());
        $visit->setWeek($this->dateFormat->getWeek());
        $visit->setYear($this->dateFormat->getYear());
        $visit->setVisits(1);

        $this->visitPersister->persist($visit);

        $this->session->set('stored', true);

    }

}