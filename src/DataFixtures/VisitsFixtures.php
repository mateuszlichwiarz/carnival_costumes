<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Visits;

class VisitsFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $date = strtotime('2022-02');

        $visitors = new Visits();

        $visitors->setMonth(1);
        $visitors->setWeek(1);
        $visitors->setYear(2022);
        $visitors->setVisits(234);

        $manager->persist($visitors);

        $manager->flush();
    }

}