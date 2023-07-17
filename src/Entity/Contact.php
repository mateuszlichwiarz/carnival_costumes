<?php

declare(strict_types=1);

namespace App\Entity;

class Contact
{
    public function __construct(
        private ?int $phone = null,
        private ?string $address = null,
        )
    {}

    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }
}