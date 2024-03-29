<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Admin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsCommand(
    name: 'app:create-admin',
    description: 'Creates administrator',
    hidden: false,
    aliases: ['app:add-admin']    
)]
class CreateAdminCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $manager,
        private UserPasswordHasherInterface $passwordHasher
    ){
        parent::__construct();
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $admin = new Admin();

        $password = 'admin2';

        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            $password
        );
        $admin->setPassword($hashedPassword);
        $admin->setUsername('admin2');
        $admin->setRoles(['ROLE_ADMIN']);

        $this->manager->persist($admin);
        $this->manager->flush();
        
        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this->setDescription('Creates administrator');
        $this->setHelp('This command create administrator');
    }
}
