<?php

declare(strict_types=1);

namespace App\Date;

use App\Date\Entity\Date;

interface BetterDateInterface
{
    public function create(string $date = null): Date;
}