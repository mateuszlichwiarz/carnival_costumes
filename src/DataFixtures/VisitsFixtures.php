<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Hume\SessionVisitsBundle\Entity\Visits;

class VisitsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($year = 2022; $year <= 2026; $year++) {
            for($month = 1; $month <= 12; $month++) {
                for($week = 1; $week <= 5; $week++) {
                    $manager->persist(new Visits($month, $week, $year, rand(0, 100)));
                    $manager->flush();
                }
            }
        }
    }
}