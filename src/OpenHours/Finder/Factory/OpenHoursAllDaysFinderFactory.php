<?php

declare(strict_types=1);

namespace App\OpenHours\Finder\Factory;

use App\Repository\OpenHoursRepository;
use App\OpenHours\Finder\OpenHoursFinder;

class OpenHoursAllDaysFinderFactory
{
    public function __construct(private OpenHoursRepository $repository)
    {}

    public function create(): OpenHoursFinder
    {
        return new OpenHoursFinder($this->repository->findAllDaysOpenHours());
    }
}