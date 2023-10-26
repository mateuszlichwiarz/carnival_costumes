<?php

declare(strict_types=1);

namespace App\Tests\Calendar;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Date\DateFormat;


final class DateFormatTest extends KernelTestCase
{
    public function testGetProperYearFormat(): void
    {
        self::bootKernel();

        $container = static::getContainer();
        $dateFormat = $container->get(DateFormat::class);

        $currentDateFormat = $dateFormat->getYear();

        $this->assertSame(2023, $currentDateFormat);
    }

    public function testGetProperMonthFormat(): void
    {
        self::bootKernel();

        $container = static::getContainer();
        $dateFormat = $container->get(DateFormat::class);

        $dateMonth = $dateFormat->getMonth();

        $this->assertSame(10, $dateMonth);
    }

    public function testGetProperWeekFormat(): void
    {
        self::bootKernel();

        $container = static::getContainer();
        $dateFormat = $container->get(DateFormat::class);

        $dateWeek = $dateFormat->getWeek();

        $this->assertSame(4, $dateWeek);
    }

    public function testCustomDateWeekFormat(): void
    {
        self::bootKernel();

        $container = static::getContainer();
        $dateFormat = $container->get(DateFormat::class);
        
        $customDateMk = mktime(0,0,0,1,8,2014);
        $customDate = date("Y-m-d", $customDateMk);

        $customDateWeek = $dateFormat->getWeek($customDate);

        $this->assertSame(2, $customDateWeek);
    }
    
}