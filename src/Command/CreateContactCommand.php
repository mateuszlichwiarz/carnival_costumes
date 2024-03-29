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
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Contact Creator',
            '=============',
            '',
        ]);

        $contact = new Contact();
        $contact
            ->setPhone('697160121')
            ->setCity($input->getArgument('Kłodzko'))
            ->setStreet($input->getArgument('Hołdu Pruskiego'))
        ;

        $this->manager->persist($contact);
        $this->manager->flush();
        
        $output->writeln('Contact has been created');

        return Command::SUCCESS;
    }
}