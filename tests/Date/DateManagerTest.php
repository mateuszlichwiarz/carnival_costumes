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
}