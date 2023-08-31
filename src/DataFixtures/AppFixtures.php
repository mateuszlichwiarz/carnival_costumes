<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


use App\Entity\Admin;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $passwordHasher)
    {}

    public function load(ObjectManager $manager): void
    {
        $admin = new Admin();

        $password = 'password';
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            $password
        );

        $admin->setPassword($hashedPassword);
        $admin->setUsername('mateusz');
        $admin->setRoles(['ROLE_ADMIN']);

        $manager->persist($admin);

        $manager->flush();
    }
}
