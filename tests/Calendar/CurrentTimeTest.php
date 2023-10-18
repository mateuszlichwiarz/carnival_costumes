<?php

declare(strict_types=1);

namespace App\Tests\Calendar;

use PHPUnit\Framework\TestCase;

use App\Calendar\CurrentTime;


final class CurrentTimeTest extends TestCase
{

    public function testGetYear(): void
    {

        $currentTime = new CurrentTime();
        $currentYear = $currentTime->getYear();

        $this->assertSame(2023, $currentYear);

    }
}