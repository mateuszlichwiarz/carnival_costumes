<?php

declare(strict_types=1);

namespace App\BetterDate\Factory;

use App\BetterDate\Factory\Interface\DateFactoryInterface;
use App\BetterDate\Entity\Date;

use DateTime;

class CurrentDateFactory implements DateFactoryInterface
{
    public function create(): Date
    {
        $date = new DateTime('now');

        return new Date($date);

    }
}