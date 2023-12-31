<?php

declare(strict_types=1);

namespace App\Date\CustomDate;

use App\Date\DateFactoryInterface;
use App\Date\Date;

use DateTime;

class CustomDateFactory implements DateFactoryInterface
{
    public function createDate($date = null): Date
    {
        if($date === null)
        {
            throw new \Exception('no date provided');
        }else
        {
            $dateTimeObject = new DateTime($date);
            return new Date($dateTimeObject);
        }
    }
}