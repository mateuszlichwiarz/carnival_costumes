<?php

declare(strict_types=1);

namespace App\Date\Factory;

use App\Date\Entity\Date;

interface DateFactoryInterface
{
    public function createDate(): Date;
}