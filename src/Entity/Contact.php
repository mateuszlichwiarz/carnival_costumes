<?php

declare(strict_types=1);

namespace App\Entity;

class Contact
{
    public function __construct(
        private null|int $phone = null,
        private ?string $address = '',
        )
    {}

    public function getPhone(): null|int
    {
        return $this->phone;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }
}