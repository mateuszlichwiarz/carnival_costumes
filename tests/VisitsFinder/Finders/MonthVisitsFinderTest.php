<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Finders;

use App\Tests\VisitsFinder\TestCase\VisitsFinderKernelTestCase;

use App\Entity\Visits;

use App\Date\Date;
use App\Date\CustomDate\CustomDateFactory;

use App\VisitsFinder\Factory\MonthVisitsFinderFactory;

final class MonthVisitsFinderTest extends VisitsFinderKernelTestCase
{
    private array $visitsFoundCollection;

    private Date $customDate;

    public function setUp(): void
    {
        $this->setUpDate();
        $this->setUpCustomDate();

        $this->setUpVisitsRepository();
        $this->setUpVisitsCollection();

        $this->setUpVisitsFound();
    }

    private function setUpCustomDate(): void
    {
        $customDateFactory = new CustomDateFactory();

        $this->customDate = $customDateFactory->createDate('01-01-2024');
    }

    protected function setUpVisitsFound(): void
    {
        $monthVisitsFinderFactory = new MonthVisitsFinderFactory();
        $monthVisitsFinder = $monthVisitsFinderFactory->createFinder(
            $this->customDate,
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