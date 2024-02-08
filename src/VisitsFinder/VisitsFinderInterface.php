<?php

declare(strict_types=1);

namespace App\VisitsFinder;

use App\Date\Entity\Date;
use App\Entity\Visits;

interface VisitsFinderInterface
{
    public function setup(array $visitsCollection, Date $date = null): void;

    public function findWeek(): Visits;

    public function findMonth(): array;

    public function findYear(): array;
}