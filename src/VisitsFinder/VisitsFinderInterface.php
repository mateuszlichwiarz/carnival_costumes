<?php

declare(strict_types=1);

namespace App\VisitsFinder;

use App\Date\Entity\Date;
use App\Entity\Visits;

interface VisitsFinderInterface
{
    public function prepare(array $visitsCollection): void;

    public function findWeek(?Date $date = null): Visits;

    public function findMonth(?Date $date = null): array;

    public function findYear(?Date $date = null): array;
}