<?php

declare(strict_types=1);

namespace App\Tests\Date\Factory;

use PHPUnit\Framework\TestCase;

use App\BetterDate\Factory\CustomDateFactory;
use App\BetterDate\Factory\CurrentDateFactory;
use App\BetterDate\Entity\Date;

final class DateFactoryTest extends TestCase
{
    public function testCanCreateCustomDateFactory(): void
    {
        $customDateFactory = new CustomDateFactory();
        $customDate = $customDateFactory->create('20-12-2020');

        $this->assertInstanceOf(Date::class, $customDate);
    }

    public function testCanCreateCurrentDateFactory(): void
    {
        $currentDateFactory = new CurrentDateFactory();
        $currentDate = $currentDateFactory->create();

        $this->assertInstanceOf(Date::class, $currentDate);
    }

    /*
    public function testExpectExceptionCustomDateFactory(): void
    {
        $customDateFactory = new CustomDateFactory();

        $this->expectException(\Exception::class);
        $customDateFactory->create();
    }
    */
}