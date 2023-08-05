<?php

declare(strict_types=1);

namespace App\Entity;

class Contact
{
    private string $city = '';

    private string $street = '';

    private null|int $phone = null;

    public function getPhone(): null|int
    {
        return $this->phone;
    }

    public function setPhone($phone): self
    {
        $this->phone = $phone;
        
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity($city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet($street): self
    {
        $this->street = $street;

        return $this;
    }
}