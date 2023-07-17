<?php

declare(strict_types=1);

class Open
{
    public function __construct(
        private ?string $monday = '',
        private ?string $tuesday = '',
        private ?string $wednesday = '',
        private ?string $thursday = '',
        private ?string $friday = '',
        private ?string $saturday = '',
        private ?string $sunday = ''
    )
    {}

    public function getMonday(): ?string
    {
        return $this->monday;
    }

    public function getTuesday(): ?string
    {
        return $this->tuesday;
    }

    public function getWednesday(): ?string
    {
        return $this->tuesday;
    }

    public function getThursday(): ?string
    {
        return $this->tuesday;
    }

    public function getFriday(): ?string
    {
        return $this->tuesday;
    }

    public function getSaturday(): ?string
    {
        return $this->tuesday;
    }

    public function getSunday(): ?string
    {
        return $this->tuesday;
    }
}