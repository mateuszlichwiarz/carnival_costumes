<?php

declare(strict_types=1);

namespace App\Tests\Calendar;

use PHPUnit\Framework\TestCase;

use App\Calendar\CurrentTime;


final class CurrentTimeTest extends TestCase
{

    public function testGetProperYearFormat(): void
    {

        $currentTime = new CurrentTime();
        $currentDateFormat = $currentTime->getYear();

        $this->assertSame(2023, $currentDateFormat);
    }

    public function testGetProperMonthFormat(): void
    {
        $currentTime = new CurrentTime();
        $currentDateFormat = $currentTime->getMonth();

        $this->assertSame(10, $currentDateFormat);
    }

    
}