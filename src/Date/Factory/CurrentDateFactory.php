<?php

declare(strict_types=1);

namespace App\Date\Factory;

use App\Date\Factory\Interface\DateFactoryInterface;
use App\Date\Entity\Date;

use DateTime;

class CurrentDateFactory implements DateFactoryInterface
{
    public function createDate(): Date
    {
        $date = new DateTime('now');

        return new Date($date);

    }
}