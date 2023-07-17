<?php

declare(strict_types=1);

class Open
{
    public function __construct(
        private null|string $monday = null,
        private null|string $tuesday = null,
        private null|string $wednesday = null,
        private null|string $thursday = null,
        private null|string $friday = null,
        private null|string $saturday = null,
        private null|string $sunday = null
    )
    {}

    public function getMonday(): null|string
    {
        return $this->monday;
    }

    public function getTuesday(): null|string
    {
        return $this->tuesday;
    }

    public function getWednesday(): null|string
    {
        return $this->tuesday;
    }

    public function getThursday(): null|string
    {
        return $this->tuesday;
    }

    public function getFriday(): null|string
    {
        return $this->tuesday;
    }

    public function getSaturday(): null|string
    {
        return $this->tuesday;
    }

    public function getSunday(): null|string
    {
        return $this->tuesday;
    }
}