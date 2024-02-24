<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Visits;

class VisitsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($k = 2022; $k <= 2026; $k++) {
            for($j = 1; $j <= 12; $j++) {
                for($i = 1; $i <= 5; $i++) {
                    $visits = new Visits();
                    $visits->setMonth($j);
                    $visits->setWeek($i);
                    $visits->setYear($k);
                    $visits->setVisits(rand(0, 100));
        
                    $manager->persist($visits);
                    $manager->flush();
                }
            }
        }
    }
}