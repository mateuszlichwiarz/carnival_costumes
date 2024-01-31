<?php

declare(strict_types=1);

namespace App\Date;

use App\Date\Entity\Date;
use App\Date\Factory\CurrentDateFactory;
use App\Date\Factory\CustomDateFactory;
use App\Date\Factory\Interface\CustomDateFactoryInterface;
use App\Date\Factory\Interface\DateFactoryInterface;

use App\Date\BetterDateInterface;

class BetterDate implements BetterDateInterface
{
    private ?string $date = null;

    public function __construct(
        private CurrentDateFactory $currentDateFactory,
        private CustomDateFactory $customDateFactory,
    ){}

    public function create($date = null): Date
    {
        if($date === null) {
            $betterDate = $this->currentDateFactory->create();
        }else {
            $betterDate = $this->customDateFactory->create($date);
        }
        return $betterDate;
    }

}