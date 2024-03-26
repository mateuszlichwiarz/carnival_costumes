<?php

declare(strict_types=1);

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Contact;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $contact = new Contact();
        $contact
            ->setPhone('700700700')
            ->setCity('Wrocław')
            ->setStreet('Mińska 13')
        ;
        $manager->persist($contact);
        $manager->flush();
        }
    }