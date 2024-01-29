<?php

declare(strict_types=1);

namespace App\Date\Factory;

use App\Date\Factory\Interface\CustomDateFactoryInterface as DateFactoryInterface;
use App\Date\Entity\Date;

use DateTime;

class CustomDateFactory implements DateFactoryInterface
{
    public function createDate(?string $date = null): Date
    {
        if($date === null) {
            throw new \Exception('no date provided');
        }else {
            $dateTimeObject = new DateTime($date);
            return new Date($dateTimeObject);
        }
    }
}