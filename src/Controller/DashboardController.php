<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'admin_index')]
    public function index()
    {   
        return $this->render('admin/index.html.twig');
    }

    public function pricing()
    {
        return $this->render('admin/pricing.html.twig');
    }

    public function contact()
    {
        return $this->render('admin/contact.html.twig');
    }

    public function openingHours()
    {
        return $this->render('admin/openingHours.html.twig');
    }

    public function events()
    {
        return $this->render('admin/events.html.twig');
    }
}