<?php

declare(strict_types=1);

namespace App\Form\OpenHours;

use App\Entity\OpenHours;
use App\Form\OpenHours\Type\OpenHoursUpdateType;
use App\Form\OpenHours\Persister\OpenHoursPersister;
use App\Form\OpenHours\DataContainer\OpenHoursDataContainerInterface;
use App\Form\OpenHours\Resolver\OpenHoursUpdateResolver;
use App\Form\OpenHours\OpenHoursFormInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class OpenHoursForm implements OpenHoursFormInterface
{
    private Form $form;

    private OpenHours $openHours;

    public function __construct(
        private OpenHoursDataContainerInterface $openHoursDataContainer,
        private OpenHoursUpdateResolver $openHoursUpdateResolver,
        private FormFactoryInterface $formFactory,
        private OpenHoursPersister $openHoursPersister,
        )
    {}

    public function createForm(): void
    {
        $this->openHours = new OpenHours();

        $this->form = $this->formFactory->create(
            OpenHoursUpdateType::class,
            $this->openHours
        );
    }

    public function handleRequest(Request $request): OpenHours|null
    {
        $this->form->handleRequest($request);
        if($this->form->isSubmitted() && $this->form->isValid())
        {
            $this->openHours = $this->form->getData();
            return $this->openHoursUpdateResolver->resolve($this->openHours);
        }else{
            return null;
        }
    }

    public function persist(OpenHours $openHours): void
    {
        $this->openHoursPersister->persist($openHours);
    }

    public function viewForm(): FormInterface
    {
        return $this->form;
    }

    public function daysContainer(): OpenHoursDataContainerInterface
    {
        return $this->openHoursDataContainer;
    }
}