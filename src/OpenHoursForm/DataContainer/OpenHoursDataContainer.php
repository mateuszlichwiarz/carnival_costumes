<?php

declare(strict_types=1);

namespace App\OpenHoursForm\DataContainer;

use App\Entity\OpenHours;
use App\Repository\OpenHoursRepository;

use App\OpenHoursForm\DataContainer\OpenHoursDataContainerInterface;

class OpenHoursDataContainer implements OpenHoursDataContainerInterface
{
    private array $allDays;

    public function __construct(private OpenHoursRepository $repository)
    {
        $this->allDays = $this->repository->findAllDaysOpenHours();
    }

    public function getAllDays(): array
    {
        return $this->allDays;
    }

    public function getOpenHoursDay(int $day): OpenHours|null
    {
        /*
        foreach($this->allDays as $openHours) {
            if($openHours->getDay() === $day){
                return $openHours;
            }
        }
        return null;
        */
        
        return $this->repository->findDayOpenHours($day);

    }
}