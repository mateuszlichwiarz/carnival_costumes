<?php

declare(strict_types=1);

namespace App\Tests\Date\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Date\BetterDateInterface;

abstract class BetterDateKernelTestCase extends KernelTestCase
{
    protected BetterDateInterface $betterDate;

    public function setUp(): void
    {
        self::bootKernel();
        $this->betterDate = self::getContainer()->get(BetterDateInterface::class);
    }
}