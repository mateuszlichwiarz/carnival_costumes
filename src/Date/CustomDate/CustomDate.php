<?php

declare(strict_types=1);

namespace App\Date\CustomDate;

use App\Date\CustomDate\CustomDateInterface;
use DateTimeImmutable;

class CustomDate implements CustomDateInterface
{
    public function __construct()
    {}

    public function getCustomDate(string $customDate = '01-01-2020'): DateTimeImmutable
    {
        return new DateTimeImmutable($customDate);
    }
}