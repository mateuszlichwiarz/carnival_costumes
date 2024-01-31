<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Factory;

use App\Date\Factory\CurrentDateFactory;
use PHPUnit\Framework\TestCase;

use App\VisitsFinder\Factory\WeekVisitsFinderFactory;
use App\VisitsFinder\Finders\WeekVisitsFinder;

use App\VisitsFinder\Factory\MonthVisitsFinderFactory;
use App\VisitsFinder\Finders\MonthVisitsFinder;

use App\VisitsFinder\Factory\YearVisitsFinderFactory;
use App\VisitsFinder\Finders\YearVisitsFinder;


use App\Date\Entity\Date;

final class VisitsFinderFactoryTest extends TestCase
{
    private array $visitsCollection;

    private Date $date;

    public function setUp(): void
    {
        $this->visitsCollection = [1 => 'string'];

        $dateFactory = new CurrentDateFactory();
        $this->date = $dateFactory->createDate();
    }

    public function testCanCreateWeekVisitsFinder(): void
    {

        $visitsFinderFactory = new WeekVisitsFinderFactory();
        $visitsFinder = $visitsFinderFactory->createFinder($this->date, $this->visitsCollection);

        $this->assertInstanceOf(WeekVisitsFinder::class, $visitsFinder);
    }

    public function testCanCreateMonthVisitsFinder(): void
    {

        $visitsFinderFactory = new MonthVisitsFinderFactory();
        $visitsFinder = $visitsFinderFactory->createFinder($this->date, $this->visitsCollection);

        $this->assertInstanceOf(MonthVisitsFinder::class, $visitsFinder);
    }

    public function testCanCreateYearVisitsFinder(): void
    {

        $visitsFinderFactory = new YearVisitsFinderFactory();
        $visitsFinder = $visitsFinderFactory->createFinder($this->date, $this->visitsCollection);

        $this->assertInstanceOf(YearVisitsFinder::class, $visitsFinder);
    }
}