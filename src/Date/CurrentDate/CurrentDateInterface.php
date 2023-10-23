<?php

declare(strict_types=1);

namespace App\Date\CurrentDate;

interface CurrentDateInterface
{
    public function getCurrentDate(): \DateTimeImmutable;
}