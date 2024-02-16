<?php

declare(strict_types=1);

namespace App\BetterDate\Factory\Interface;

use App\BetterDate\Entity\Date;

interface CustomDateFactoryInterface extends DateFactoryInterface
{
    public function create(string $date = null): Date;
}