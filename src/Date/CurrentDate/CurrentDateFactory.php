<?php

declare(strict_types=1);

namespace App\Date\CurrentDate;

use App\Date\DateFactoryInterface;
use App\Date\Date;

use DateTime;

class CurrentDateFactory implements DateFactoryInterface
{
    public function createDate(): Date
    {
        $date = new DateTime('now');

        return new Date($date);

    }
}