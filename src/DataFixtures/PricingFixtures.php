<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Pricing;

class PricingFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $pricing = new Pricing();
        $pricing
            ->setDeposit(50)
            ->setMinPrice(30)
            ->setMaxPrice(35)
        ;
        $manager->persist($pricing);
        $manager->flush();
        }
}