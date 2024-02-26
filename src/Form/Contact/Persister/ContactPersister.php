<?php

declare(strict_types=1);

namespace App\Form\Contact\Persister;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;

class ContactPersister
{
    public function __construct(private EntityManagerInterface $manager)
    {}

    public function persist(Contact $contact): void
    {
        $this->manager->persist($contact);
        $this->manager->flush();
    }

    public function remove(Contact $contact): void
    {
        $this->manager->remove($contact);
        $this->manager->flush();
    }
}