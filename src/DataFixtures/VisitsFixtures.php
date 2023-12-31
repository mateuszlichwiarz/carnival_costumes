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

        for($k = 2022; $k <=2026; $k++)
        {
            for($j = 1; $j <= 12; $j++)
            {
                for($i = 1; $i <= 5; $i++)
                {
                    $visitors = new Visits();
        
                    $visitors->setMonth($j);
                    $visitors->setWeek($i);
                    $visitors->setYear($k);
                    $visitors->setVisits(rand(0, 100));
        
                    $manager->persist($visitors);
                    $manager->flush();
                }
            }
        }
        
    }

}