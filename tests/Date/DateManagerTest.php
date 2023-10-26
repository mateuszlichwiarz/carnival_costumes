<?php

declare(strict_types=1);

namespace App\Tests\Date;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Date\DateManager;


final class DateManagerTest extends KernelTestCase
{
    public function testGetCurrentDate(): void
    {
        self::bootKernel();

        $container = static::getContainer();
        $dateManager = $container->get(DateManager::class);

        $date = $dateManager->getDate()->format("Y-m-d");
        $this->assertSame(date("Y-m-d"), $date);
    }

    public function testGetCustomDate(): void
    {
        self::bootKernel();

        $container = static::getContainer();
        $dateManager = $container->get(DateManager::class);

        $customDateMk = mkTime(0, 0, 0, 2, 2, 2020);
        $customDate = date("Y-m-d", $customDateMk);


        $date = $dateManager->getDate('2020-02-02')->format('Y-m-d');
        $this->assertSame($customDate, $date);
    }
}