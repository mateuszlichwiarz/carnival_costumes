<?php

declare(strict_types=1);

namespace App\Entity;

class Contact
{
    public function __construct(
        private int $phone,
        private string $address,
        private Array $openTime,
        )
    {}

    public function getPhone(): int
    {
        return $this->phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getOpenTime(): array
    {
        return $this->openTime;
    }
}