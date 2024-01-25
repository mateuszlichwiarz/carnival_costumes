<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Finders;

use App\Tests\VisitsFinder\VisitsFinderKernelTestCase;

use App\Entity\Visits;

use App\Date\Date;
use App\Date\CustomDate\CustomDateFactory;

use App\VisitsFinder\Factory\YearVisitsFinderFactory;

final class YearVisitsFinderTest extends VisitsFinderKernelTestCase
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
        $yearVisitsFinderFactory = new YearVisitsFinderFactory();
        $yearVisitsFinder = $yearVisitsFinderFactory->createFinder(
            $this->customDate,
            $this->visitsCollection
        );
        $this->visitsFoundCollection = $yearVisitsFinder->find();
    }

    protected function setUpProperVisits(): void
    {}

    public function testFindWeeksInYear()
    {
        $amountWeekVisits = count($this->visitsFoundCollection);

        $this->assertEquals($amountWeekVisits, 60);
    }
}