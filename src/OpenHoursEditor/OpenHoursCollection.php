<?php

declare(strict_types=1);

namespace App\OpenHoursEditor;

use App\Entity\OpenHours;
use App\Repository\OpenHoursRepository;
use Doctrine\Common\Collections\ArrayCollection;

class OpenHoursCollection
{
    private arrayCollection $list = [];

    public function __construct(private OpenHoursRepository $repository)
    {
        $this->list = new ArrayCollection($this->repository->findAllDaysOpenHours());
    }
}