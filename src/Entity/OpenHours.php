<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PricingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PricingRepository::class)]
class OpenHours
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private ?string $day = '';

    #[ORM\Column]
    private null|int $start = null;

    #[ORM\Column]
    private null|int $end = null;

    public function __construct(
        ?string $day,
        null|int $start,
        null|int $end
    ){
        $this->day;
        $this->start;
        $this->end;
    }

    public function getDay(): ?string
    {
        return $this->day;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function getEnd(): ?int
    {
        return $this->end;
    }
}