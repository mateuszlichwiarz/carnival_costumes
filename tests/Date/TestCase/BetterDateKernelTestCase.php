<?php

declare(strict_types=1);

namespace App\Tests\Date\TestCase;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Date\BetterDate;

abstract class BetterDateKernelTestCase extends KernelTestCase
{
    protected BetterDate $betterDate;

    public function setUp(): void
    {
        self::bootKernel();
        $this->betterDate = self::getContainer()->get(BetterDate::class);
    }
}