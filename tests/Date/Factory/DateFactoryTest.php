<?php

declare(strict_types=1);

namespace App\Tests\Date\Factory;

use PHPUnit\Framework\TestCase;

use App\Date\Factory\CustomDateFactory;
use App\Date\Factory\CurrentDateFactory;
use App\Date\Entity\Date;

final class DateFactoryTest extends TestCase
{
    public function testCanCreateCustomDateFactory(): void
    {
        $customDateFactory = new CustomDateFactory();
        $customDate = $customDateFactory->createDate('20-12-2020');

        $this->assertInstanceOf(Date::class, $customDate);
    }

    public function testExpectExceptionCustomDateFactory(): void
    {
        $customDateFactory = new CustomDateFactory();

        $this->expectException(\Exception::class);
        $customDateFactory->createDate();
    }

    public function testCanCreateCurrentDateFactory(): void
    {
        $currentDateFactory = new CurrentDateFactory();
        $currentDate = $currentDateFactory->createDate();

        $this->assertInstanceOf(Date::class, $currentDate);
    }
}