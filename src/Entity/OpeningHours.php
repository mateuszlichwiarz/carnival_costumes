<?php

declare(strict_types=1);

namespace App\Entity;

class OpeningHours
{
    private ?string $monday = '';

    private ?string $tuesday = '';

    private ?string $wednesday = '';

    private ?string $thursday = '';

    private ?string $friday = '';

    private ?string $saturday = '';

    private ?string $sunday = '';

    public function getMonday(): ?string
    {
        return $this->monday;
    }

    public function setMonday($monday): self
    {
        $this->monday = $monday;
        return $this;
    }

    public function getTuesday(): ?string
    {
        return $this->tuesday;
    }

    public function setTuesday($tuesday): self
    {
        $this->tuesday = $tuesday;
        return $this;
    }

    public function getWednesday(): ?string
    {
        return $this->wednesday;
    }

    public function setWednesday($wednesday): self
    {
        $this->wednesday = $wednesday;
        return $this;
    }

    public function getThursday(): ?string
    {
        return $this->thursday;
    }

    public function setThursday($thursday): self
    {
        $this->thursday = $thursday;
        return $this;
    }

    public function getFriday(): ?string
    {
        return $this->friday;
    }

    public function setFriday($friday): self
    {
        $this->friday = $friday;
        return $this;
    }

    public function getSaturday(): ?string
    {
        return $this->saturday;
    }

    public function setSaturday($saturday): self
    {
        $this->saturday = $saturday;
        return $this;
    }

    public function getSunday(): ?string
    {
        return $this->sunday;
    }

    public function setSunday($sunday): self
    {
        $this->sunday = $sunday;
        return $this;
    }
}