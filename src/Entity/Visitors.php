<?php

namespace App\Entity;

use App\Repository\VisitorsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VisitorsRepository::class)]
class Visitors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $week = null;

    #[ORM\Column(length: 255)]
    private ?string $month = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $year = null;

    #[ORM\Column]
    private ?int $visitors = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeek(): ?string
    {
        return $this->week;
    }

    public function setWeek(string $week): static
    {
        $this->week = $week;

        return $this;
    }

    public function getMonth(): ?string
    {
        return $this->month;
    }

    public function setMonth(string $month): static
    {
        $this->month = $month;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): static
    {
        $this->year = $year;

        return $this;
    }

    public function getVisitors(): ?int
    {
        return $this->visitors;
    }

    public function setVisitors(int $visitors): static
    {
        $this->visitors = $visitors;

        return $this;
    }
}
