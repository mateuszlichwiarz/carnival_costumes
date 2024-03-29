<?php

declare(strict_types=1);

namespace App\Command;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(
    name: 'app:create-contact',
    description: 'Creates contact',
    hidden: false,
    aliases: ['app:add-contact']    
)]
class CreateContactCommand extends Command
{
    public function __construct(
        private EntityManagerInterface $manager,
    ){
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Creates contact');
        $this->setHelp('This command create contact');
        $this->addArgument('phone', InputArgument::REQUIRED, 'phone number.');
        $this->addArgument('city', InputArgument::REQUIRED, 'city.');
        $this->addArgument('street', InputArgument::REQUIRED, 'city.');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Admin Creator',
            '=============',
            '',
        ]);

        $contact = new Contact();
        $contact
            ->setPhone($input->getArgument('phone'))
            ->setCity($input->getArgument('city'))
            ->setStreet($input->getArgument('street'))
        ;

        $this->manager->persist($contact);
        $this->manager->flush();
        
        $output->writeln('Contact has been created');

        return Command::SUCCESS;
    }
}