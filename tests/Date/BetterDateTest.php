<?php

declare(strict_types=1);

namespace App\Tests\Date;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Tests\Date\TestCase\BetterDateKernelTestCase;

use App\Date\BetterDate;
use App\Date\Entity\Date;

class BetterDateTest extends BetterDateKernelTestCase
{
    private Date $date;

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateCustomDate(): void
    {
        $date = $this->betterDate->create('14-02-2006');

        $this->assertInstanceOf(Date::class, $date);
    }

    public function testCreateCurrentDate(): void
    {
        $date = $this->betterDate->create();

        $this->assertInstanceOf(Date::class, $date);
    }

    public function testCustomGetWeek(): void
    {
        $date = $this->betterDate->create('14-02-2006');
        $week = $date->getWeek();

        $this->assertEquals($week, 2);
    }

    public function testCustomGetMonth(): void
    {
        $date = $this->betterDate->create('14-02-2006');
        $month = $date->getMonth();

        $this->assertEquals($month, 2);
    }

    public function testCustomGetYear(): void
    {
        $date = $this->betterDate->create('14-02-2006');
        $year = $date->getYear();

        $this->assertEquals($year, 2006);
    }
}