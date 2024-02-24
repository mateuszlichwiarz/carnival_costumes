<?php

declare(strict_types=1);

namespace App\Tests\Form\OpenHours\Factory;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Form\OpenHours\Factory\OpenHoursUpdateFactory;
use App\Entity\OpenHours;

class OpenHoursUpdateFactoryTest extends KernelTestCase
{
    private \DateTime $dateTime;

    private OpenHoursUpdateFactory $factory;

    private OpenHours $expectedOpenHours;

    private OpenHours $mockFoundOpenHours;

    private OpenHours $mockFormOpenHours;

    public function setUp(): void
    {
        $this->factory = new OpenHoursUpdateFactory();
        $this->expectedOpenHours = new OpenHours();

        $this->dateTime = new \DateTime('2001-01-01');
        $this->mockFoundOpenHours = new OpenHours();
        $this->mockFoundOpenHours
            ->setDay(1)
            ->setIsClosed(false)
            ->setStartDate($this->dateTime->setTime(8, 30))
            ->setEndDate($this->dateTime->setTime(14, 30))
        ;

        $this->mockFormOpenHours = new OpenHours();
        $this->mockFormOpenHours
            ->setDay(1)
            ->setIsClosed(true)
            ->setStartDate($this->dateTime->setTime(8, 35))
            ->setEndDate($this->dateTime->setTime(15, 0))
        ;
    }

    public function testCreateUpdateReturnOpenHoursType(): void
    {
        $updatedOpenHours = $this->factory->createUpdate(
            $this->mockFoundOpenHours,
            $this->mockFormOpenHours
        );

        $this->assertInstanceOf(OpenHours::class, $updatedOpenHours);
    }

    public function testCreateUpdateSuccess()
    {
        $this->assertEquals(
            $this->expectedOpenHours
                ->setDay(1)
                ->setIsClosed(true)
                ->setStartDate($this->dateTime->setTime(8, 35))
                ->setEndDate($this->dateTime->setTime(15, 0))
            ,
            $this->factory->createUpdate(
                $this->mockFoundOpenHours,
                $this->mockFormOpenHours,
            )
        );
    }
}