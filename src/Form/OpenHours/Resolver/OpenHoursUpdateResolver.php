<?php

declare(strict_types=1);

namespace App\OpenHoursForm\Resolver;

use App\Entity\OpenHours;
use App\OpenHoursForm\Resolver\OpenHoursUpdateResolverInterface;
use App\OpenHoursForm\Factory\OpenHoursUpdateFactoryInterface;
use App\OpenHoursForm\DataContainer\OpenHoursDataContainerInterface;

class OpenHoursUpdateResolver implements OpenHoursUpdateResolverInterface
{
    public function __construct(
        private OpenHoursDataContainerInterface $dataContainer,
        private OpenHoursUpdateFactoryInterface $openHoursUpdateFactory,
        )
    {}

    public function resolve(OpenHours $formData): OpenHours
    {
        $foundOpenHoursDay = $this->dataContainer->getOpenHoursDay($formData->getDay());
        if($foundOpenHoursDay !== null) {
            return $this->openHoursUpdateFactory->createUpdate(
                $foundOpenHoursDay,
                $formData
            );
        }
        return $formData;
    }
}