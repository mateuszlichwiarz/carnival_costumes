<?php

declare(strict_types=1);

namespace App\Tests\Calendar;

use PHPUnit\Framework\TestCase;

use App\Date\DateFormat;


final class DateFormatTest extends TestCase
{

    public function testGetProperYearFormat(): void
    {

        $dateFormat = new DateFormat();
        $currentDateFormat = $dateFormat->getYear();

        $this->assertSame(2023, $currentDateFormat);
    }

    public function testGetProperMonthFormat(): void
    {
        $currentTime = new DateFormat();
        $currentDateFormat = $currentTime->getMonth();

        $this->assertSame(10, $currentDateFormat);
    }

    public function testGetProperWeekFormat(): void
    {
        $currentTime = new DateFormat();
        $currentDateFormat = $currentTime->getWeek();

        $this->assertSame(3, $currentDateFormat);
    }

    public function testCustomDateWeekFormat(): void
    {
        $currentTime = new DateFormat();
        
        $date = mktime(0,0,0,1,8,2014);

        $currentDateFormat = $currentTime->getWeek($date);

        $this->assertSame(2, $currentDateFormat);
    }
    
}