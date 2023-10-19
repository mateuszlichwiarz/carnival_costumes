<?php

declare(strict_types=1);

namespace App\Date;

class DateFormat
{
    public function getWeek($date = null): int|bool
    {

        $day = $this->getDayFromDate($date);

        $weekend = 7;
        switch($day)
        {
            case $weekend - $day:
                return 1;
        }

        if($day > 0 && $day  <= 7)
        {
            return 1;
        }elseif($day > 7 && $day <= 14)
        {
            return 2;
        }elseif($day > 14 && $day <= 21)
        {
            return 3;
        }elseif($day > 21 && $day <= 28)
        {
            return 4;
        }elseif($day >28 && $day <= 31)
        {
            return 5;
        }else
        {
            return false;
        }
    }

    private function getDayFromDate($date = null)
    {
        if ($date === null) {
            $day = intval(date('d'));
        }else {

            $day = intval(date('d', $date));
        }

        return $day;
    }

    public function getMonth(): int
    {
        return intval(date('m'));
    }

    public function getYear(): int
    {
        return intval(date('Y'));
    }

}