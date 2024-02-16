<?php

declare(strict_types=1);

namespace App\BetterDate\Factory\Interface;

use App\BetterDate\Entity\Date;

interface DateFactoryInterface
{
    public function create(): Date;
}