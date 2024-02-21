<?php

declare(strict_types=1);

namespace App\OpenHours\Finder;

use App\Entity\OpenHours;
use App\Repository\OpenHoursRepository;

class OpenHoursFinder
{
    private array $days;

    public function __construct(private array $repository)
    {
        $this->days = $this->repository;
    }

    public function findDay(int $day): OpenHours|null
    {
        $found = $this->days[$day-1];
        if(isset($found)){ return $found; }else return null;
    }

    public function findDays(): array
    {
        return $this->days;
    }
}