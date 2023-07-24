<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController
{
    #[Route('/home', name: 'home')]
    public function home(Request $request): Response
    {
        return new Response('/home');
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return new Response('/contact');
    }

    public function priceList(): Response
    {
        return new Response();
    }
}