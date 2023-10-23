<?php

declare(strict_types=1);

namespace App\Date\CustomDate;

interface CustomDateInterface
{
    public function getCustomDate(string $format): \DateTimeImmutable;
}