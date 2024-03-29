<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Admin;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
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

    protected function configure(): void
    {
        $this->setDescription('Creates administrator');
        $this->setHelp('This command create administrator');
        $this->addArgument('username', InputArgument::REQUIRED, 'Admin name.');
        $this->addArgument('password', InputArgument::REQUIRED, 'Password');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Admin Creator',
            '=============',
            '',
        ]);

        $admin = new Admin();
        
        $hashedPassword = $this->passwordHasher->hashPassword(
            $admin,
            $input->getArgument('password')
        );

        $admin->setUsername($input->getArgument('username'));
        $admin->setPassword($hashedPassword);
        $admin->setRoles(['ROLE_ADMIN']);

        $this->manager->persist($admin);
        $this->manager->flush();
        
        $output->writeln('Admin has been created');

        return Command::SUCCESS;
    }
}
