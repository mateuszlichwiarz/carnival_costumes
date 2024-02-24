<?php

declare(strict_types=1);

namespace App\Test\Form\OpenHours\DataContainer;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Entity\OpenHours;
use App\Form\OpenHours\DataContainer\OpenHoursDataContainerInterface;

class OpenHoursDataContainerTest extends KernelTestCase
{
    private OpenHoursDataContainerInterface $dataContainer;


    public function setUp(): void
    {
        self::bootKernel();
        $this->dataContainer = self::getContainer()->get(OpenHoursDataContainerInterface::class);

    }

    public function testGetAllOpenHoursCount(): void
    {
        $this->assertSame(5, count($this->dataContainer->getAllDays()));
    }

    public function testGetOpenHoursDaySuccess(): void
    {
        $startDate = new \DateTime('2001-01-01');
        $startDate->setTime(8, 30);
        
        $endDate = new \DateTime('2001-01-01');
        $endDate->setTime(14, 30);

        $mockOpenHours = new OpenHours();
        $mockOpenHours
                ->setDay(2)
                ->setIsClosed(true)
                ->setStartDate($startDate)
                ->setEndDate($endDate)
        ;
        $foundOpenHours = $this->dataContainer->getOpenHoursDay(2);
        $this->assertInstanceOf(OpenHours::class, $foundOpenHours);
        $this->assertEquals($mockOpenHours, $foundOpenHours);
    }
}