<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Finders;

use App\Tests\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use App\Entity\Visits;

use App\Date\Entity\Date;

use App\VisitsFinder\Factory\MonthVisitsFinderFactory;

final class MonthVisitsFinderTest extends VisitsFinderKernelTestCase
{
    private array $visitsFoundCollection;

    private Date $date;

    public function setUp(): void
    {
        parent::setUp();
        $this->date = $this->betterDate->create();
        $this->setUpVisitsFound();
    }

    protected function setUpVisitsFound(): void
    {
        $monthVisitsFinderFactory = new MonthVisitsFinderFactory();
        $monthVisitsFinder = $monthVisitsFinderFactory->createFinder(
            $this->date,
            $this->visitsCollection
        );
        $this->visitsFoundCollection = $monthVisitsFinder->find();
    }

    public function testFindWeekInMonth()
    {
        $amountWeekVisits = count($this->visitsFoundCollection);

        $this->assertEquals($amountWeekVisits, 5);
    }
}