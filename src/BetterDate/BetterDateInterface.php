<?php

declare(strict_types=1);

namespace App\BetterDate;

use App\BetterDate\Entity\Date;

interface BetterDateInterface
{
    public function create(string $date = null): Date;
}