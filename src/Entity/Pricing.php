<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\PricingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PricingRepository::class)]
class Pricing
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private null|int $minPrice = 0;

    #[ORM\Column]
    private null|int $maxPrice = 0;

    #[ORM\Column]
    private null|int $deposit = 0;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    public function setMinPrice(int $minPrice): self
    {
        $this->minPrice = $minPrice;
        return $this;
    }

    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    public function setMaxPrice(int $maxPrice): self
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    public function getDeposit(): ?int
    {
        return $this->deposit;
    }

    public function setDeposit(int $deposit): self
    {
        $this->deposit = $deposit;
        return $this;
    }

}