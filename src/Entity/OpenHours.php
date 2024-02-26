<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OpenHoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpenHoursRepository::class)]
class OpenHours
{
    #[ORM\Id]
    #[ORM\Column]
    private int $day;

    #[ORM\Column]
    private bool $isClosed;

    #[ORM\Column]
    private \DateTime $startDate;

    #[ORM\Column]
    private \DateTime $endDate;

    public function getDayStringType(): string
    {
        $day = $this->day;
        switch($day)
        {
            case 1:
                $day = 'Monday';
            break;
            case 2:
                $day = 'Tuesday';
            break;
            case 3:
                $day = 'Wednesday';
            break;
            case 4:
                $day = 'Thursday';
            break;
            case 5:
                $day = 'Friday';
            break;
            case 6:
                $day = 'Saturday';
            break;
            case 7:
                $day = 'Sunday';
            break;
        }
        return $day;
    }

    public function getDayPolishStringType(): string
    {
        $day = $this->day;
        switch($day)
        {
            case 1:
                $day = 'Poniedziałek';
            break;
            case 2:
                $day = 'Wtorek';
            break;
            case 3:
                $day = 'Środa';
            break;
            case 4:
                $day = 'Czwartek';
            break;
            case 5:
                $day = 'Piątek';
            break;
            case 6:
                $day = 'Sobota';
            break;
            case 7:
                $day = 'Niedziela';
            break;
        }
        return $day;
    }

    public function getDay(): int
    {
        return $this->day;
    }

    public function setDay(int $day): self
    {
        $this->day = $day;
        return $this;
    }

    public function getIsClosed(): ?bool
    {
        return $this->isClosed;
    }

    public function setIsClosed(bool $isClosed): self
    {
        $this->isClosed = $isClosed;
        return $this;
    }

    public function getStartDate(): ?\DateTime
    {
        return $this->startDate;
    }

    public function getStringStartDate(): string
    {
        return $this->startDate->format('H:i');
    }

    public function setStartDate(\DateTime $startDate): self
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function getEndDate(): ?\DateTime
    {
        return $this->endDate;
    }

    public function getStringEndDate(): string
    {
        return $this->endDate->format('H:i');
    }

    public function setEndDate(\DateTime $endDate): self
    {
        $this->endDate = $endDate;
        return $this;
    }
}