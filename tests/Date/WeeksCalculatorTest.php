<?php

namespace App\Tests\Date;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Date\CurrentDate\CurrentDateFactory;
use App\Date\WeeksCalculatorTrait;

final class DateTest extends KernelTestCase
{
    use WeeksCalculatorTrait;

    public function testProperOutputCalculateWeek()
    {
        $day = 3;
        $week = $this->calculateWeek($day);

        $this->assertEquals(1 , $week);

        $day = 3+7;
        $week = $this->calculateWeek($day);
        $this->assertEquals(2, $week);

        $day = 3+14;
        $week = $this->calculateWeek($day);
        $this->assertEquals(3, $week);

        $day = 3+21;
        $week = $this->calculateWeek($day);
        $this->assertEquals(4, $week);

        $day = 3+28;
        $week = $this->calculateWeek($day);
        $this->assertEquals(5, $week);
    }
}