<?php

declare(strict_types=1);

namespace App\BetterDate\Factory;

use App\BetterDate\Factory\Interface\CustomDateFactoryInterface as DateFactoryInterface;
use App\BetterDate\Entity\Date;

use DateTime;

class CustomDateFactory implements DateFactoryInterface
{
    public function create(?string $date = null): Date
    {
        return new Date(
            new DateTime($date)
        );
    }
}