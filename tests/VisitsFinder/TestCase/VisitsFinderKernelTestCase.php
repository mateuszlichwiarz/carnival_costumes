<?php

declare(strict_types=1);

namespace App\Tests\VisitsFinder\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

use App\Repository\VisitsRepository;

use App\Date\Entity\Date;
use App\Date\BetterDateInterface;

abstract class VisitsFinderKernelTestCase extends KernelTestCase
{
    protected ?array $visitsCollection;

    protected VisitsRepository $visitsRepository;

    protected Date $betterDate;

    public function setUp(): void
    {
        self::bootKernel();
        $this->betterDate = self::getContainer()->get(BetterDateInterface::class);
    }

    abstract protected function setUpVisitsFound(): void;
    
    protected function setUpVisitsRepository(): void
    {
        $this->visitsRepository = self::getContainer()->get(VisitsRepository::class);
    }

    protected function setUpVisitsCollection(): void
    {
        $this->visitsCollection = $this->visitsRepository->findAll();
    }
}