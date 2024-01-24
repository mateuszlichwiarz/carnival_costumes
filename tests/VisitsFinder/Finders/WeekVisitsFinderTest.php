<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Finders;

use App\Tests\VisitsFinder\VisitsFinderKernelTestCase;

use App\Entity\Visits;

use App\VisitsFinder\Factory\WeekVisitsFinderFactory;

final class WeekVisitsFinderTest extends VisitsFinderKernelTestCase
{
    private Visits $visitsFound;

    private Visits $properVisits;

    public function setUp(): void
    {
        $this->setUpDate();
        $this->setUpVisitsRepository();
        $this->setUpVisitsCollection();

        $this->setUpVisitsFound();
        $this->setUpProperVisits();
    }

    protected function setUpVisitsFound(): void
    {
        $weekVisitsFinderFactory = new WeekVisitsFinderFactory();
        $weekVisitsFinder = $weekVisitsFinderFactory->createFinder($this->currentDate, $this->visitsCollection);
        $this->visitsFound = $weekVisitsFinder->find();
    }

    protected function setUpProperVisits(): void
    {
        $this->properVisits = new Visits();
        $this->properVisits
            ->setWeek($this->currentDate->getWeek())
            ->setMonth($this->currentDate->getMonth())
            ->setYear($this->currentDate->getYear());
    }

    public function testWeekFinderAssertYear(): void
    {
        $this->assertSame($this->visitsFound->getYear(), $this->properVisits->getYear());
    }

    public function testWeekFinderAssertMonth(): void
    {
        $this->assertSame($this->visitsFound->getMonth(), $this->properVisits->getMonth());
    }

    public function testWeekFinderAssertWeek(): void
    {
        $this->assertSame($this->visitsFound->getWeek(), $this->properVisits->getWeek());
    }
}