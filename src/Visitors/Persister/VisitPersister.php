<?php

declare(strict_types=1);

namespace App\Visitors\Persister;

use Doctrine\ORM\EntityManagerInterface;


class VisitPersister
{
    public function __construct(private EntityManagerInterface $manager)
    {}

    public function persist(object $data): void
    {
        $this->manager->persist($data);
        $this->manager->flush();
    }

    public function remove(object $data): void
    {
        $this->manager->remove($data);
        $this->manager->flush();
    }
}