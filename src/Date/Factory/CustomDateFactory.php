<?php

declare(strict_types=1);

namespace App\Date\Factory;

use App\Date\Factory\Interface\CustomDateFactoryInterface as DateFactoryInterface;
use App\Date\Entity\Date;

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