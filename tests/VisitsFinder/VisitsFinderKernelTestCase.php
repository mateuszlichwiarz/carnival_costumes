<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Repository\VisitsRepository;

use App\Date\CurrentDate\CurrentDateFactory;
use App\Date\Date;

abstract class VisitsFinderKernelTestCase extends KernelTestCase
{
    protected ?array $visitsCollection;

    protected VisitsRepository $visitsRepository;

    protected Date $currentDate;

    abstract protected function setUpVisitsFound(): void;

    abstract protected function setUpProperVisits(): void;

    protected function setUpDate(): void
    {
        $dateFactory = new CurrentDateFactory();
        $this->currentDate = $dateFactory->createDate();
    }
    
    protected function setUpVisitsRepository(): void
    {
        self::bootKernel();
        $this->visitsRepository = self::getContainer()->get(VisitsRepository::class);
    }

    protected function setUpVisitsCollection(): void
    {
        $this->visitsCollection = $this->visitsRepository->findAll();
    }
}