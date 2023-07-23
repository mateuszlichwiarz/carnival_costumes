<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class MainController
{
    public function home(): Response
    {
        return new Response();
    }

    public function contact(): Response
    {
        return new Response();
    }

    public function priceList(): Response
    {
        return new Response();
    }
}