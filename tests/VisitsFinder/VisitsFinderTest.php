<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder;

use App\Tests\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use App\VisitsFinder\VisitsFinderInterface;

use App\Date\Entity\Date;
use App\Entity\Visits;

final class VisitsFinderTest extends VisitsFinderKernelTestCase
{
    private VisitsFinderInterface $visitsFinder;

    private Visits $properVisits;

    private Date $currentDate;

    public function setUp(): void
    {
        parent::setUp();
        $this->currentDate = $this->betterDate->create();
        $this->setUpProperVisits();
        $this->setUpVisitsFound();
    }

    private function setUpProperVisits(): void
    {
        $this->properVisits = new Visits();
        $this->properVisits
            ->setWeek($this->currentDate->getWeek())
            ->setMonth($this->currentDate->getMonth())
            ->setYear($this->currentDate->getYear());
    }

    protected function setUpVisitsFound(): void
    {
        $this->visitsFinder = self::getContainer()->get(VisitsFinderInterface::class);
        $this->visitsFinder->setup($this->visitsCollection, $this->betterDate->create());
    }

    public function testVisitsFinderWeek(): void
    {
        $visits = $this->visitsFinder->findWeek();

        $this->assertSame($visits->getWeek(),  $this->properVisits->getWeek());
        $this->assertSame($visits->getMonth(), $this->properVisits->getMonth());
        $this->assertSame($visits->getYear(),  $this->properVisits->getYear());
    }
}