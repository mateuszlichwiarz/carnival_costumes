<?php

declare(strict_types=1);

namespace App\Date\Factory\Interface;

use App\Date\Entity\Date;

interface CustomDateFactoryInterface extends DateFactoryInterface
{
    public function create(string $date = null): Date;
}