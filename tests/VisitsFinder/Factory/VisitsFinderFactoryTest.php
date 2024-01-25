<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\Factory;

use App\Date\CurrentDate\CurrentDateFactory;
use PHPUnit\Framework\TestCase;

use App\VisitsFinder\Factory\WeekVisitsFinderFactory;
use App\VisitsFinder\Finders\WeekVisitsFinder;
use App\Date\Date;

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

    public function testCanCreateVisitsFinder(): void
    {

        $visitsFinderFactory = new WeekVisitsFinderFactory();
        $visitsFinder = $visitsFinderFactory->createFinder($this->date, $this->visitsCollection);

        return $this->assertInstanceOf(WeekVisitsFinder::class, $visitsFinder);
    }
}