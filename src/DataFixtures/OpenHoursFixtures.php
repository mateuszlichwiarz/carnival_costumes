<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\OpenHours;

class OpenHoursFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for($i = 1; $i <= 5; $i++) {
            $dateTimeStart = new \DateTime('2001-01-01');
            $dateTimeStart->setTime(8,30);
            $dateTimeEnd = new \DateTime('2001-01-01');
            $dateTimeEnd->setTime(14, 30);

            $openHours = new OpenHours();
            $openHours
                ->setDay($i)
                ->setIsClosed(true)
                ->setStartDate($dateTimeStart)
                ->setEndDate($dateTimeEnd)
            ;
            $manager->persist($openHours);
            $manager->flush();
        }
    }
}