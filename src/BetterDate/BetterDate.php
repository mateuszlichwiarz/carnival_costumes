<?php

declare(strict_types=1);

namespace App\BetterDate;

use App\BetterDate\Entity\Date;
use App\BetterDate\Factory\CurrentDateFactory;
use App\BetterDate\Factory\CustomDateFactory;
use App\BetterDate\Factory\Interface\CustomDateFactoryInterface;
use App\BetterDate\Factory\Interface\DateFactoryInterface;

use App\BetterDate\BetterDateInterface;

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