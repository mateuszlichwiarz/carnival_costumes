<?php

declare(strict_types=1);

namespace App\Test\Form\OpenHours\Resolver;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Entity\OpenHours;
use App\Form\OpenHours\Resolver\OpenHoursUpdateResolverInterface;
use App\Form\OpenHours\DataContainer\OpenHoursDataContainerInterface;

class OpenHoursUpdateResolverTest extends KernelTestCase
{
    private OpenHoursUpdateResolverInterface $resolver;

    private OpenHoursDataContainerInterface $dataContainer;

    private \DateTime $dateTimeStart;

    private \DateTime $dateTimeEnd;

    public function setUp(): void
    {
        self::bootKernel();
        $this->resolver = self::getContainer()->get(OpenHoursUpdateResolverInterface::class);
        $this->dataContainer = self::getContainer()->get(OpenHoursDataContainerInterface::class);

        $this->dateTimeStart = new \DateTime('2001-01-01');
        $this->dateTimeStart->setTime(10, 30);
        $this->dateTimeEnd = new \DateTime('2001-01-01');
        $this->dateTimeEnd->setTime(15, 30);

    }

    public function testResolveReturnOpenHoursWhenIsNotSavedInDb(): void
    {
        $mockFormOpenHours = new OpenHours();
        $mockFormOpenHours
            ->setDay(6)
            ->setIsClosed(false)
            ->setStartDate($this->dateTimeStart)
            ->setEndDate($this->dateTimeEnd)
        ;

        $this->assertSame(
            $mockFormOpenHours,
            $this->resolver->resolve($mockFormOpenHours)
        );
    }
}