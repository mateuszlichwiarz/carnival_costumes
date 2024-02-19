<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\OpenHoursRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OpenHoursRepository::class)]
class OpenHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?string $day = '';

    #[ORM\Column]
    private bool $isClosed;

    #[ORM\Column]
    private \DateTime $startDate;

    #[ORM\Column]
    private \DateTime $endDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function setDay(string $day): self
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