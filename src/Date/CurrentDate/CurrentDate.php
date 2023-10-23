<?php

declare(strict_types=1);

namespace App\Date\CurrentDate;

use App\Date\CurrentDate\CurrentDateInterface;
use DateTimeImmutable;

class CurrentDate implements CurrentDateInterface
{
    public function __construct()
    {}

    public function getCurrentDate(): DateTimeImmutable
    {
        return new DateTimeImmutable("now");
    }
}