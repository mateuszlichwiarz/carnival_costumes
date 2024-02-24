<?php

declare(strict_types=1);

namespace App\Form\OpenHours\Resolver;

use App\Entity\OpenHours;
use App\Form\OpenHours\Resolver\OpenHoursUpdateResolverInterface;
use App\Form\OpenHours\Factory\OpenHoursUpdateFactoryInterface;
use App\Form\OpenHours\DataContainer\OpenHoursDataContainerInterface;

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