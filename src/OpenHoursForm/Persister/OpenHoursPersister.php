<?php

declare(strict_types=1);

namespace App\OpenHoursForm\Persister;

use App\Entity\OpenHours;
use Doctrine\ORM\EntityManagerInterface;

class OpenHoursPersister
{
    public function __construct(private EntityManagerInterface $manager)
    {}

    public function persist(OpenHours $openHours): void
    {
        $this->manager->persist($openHours);
        $this->manager->flush();
    }

    public function remove(OpenHours $openHours): void
    {
        $this->manager->remove($openHours);
        $this->manager->flush();
    }
}