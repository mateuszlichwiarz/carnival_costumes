<?php

declare(strict_types=1);

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GalleryController extends AbstractController
{
    #[Route('dashboard/gallery', name: 'dashboard_gallery')]
    public function GalleryUpdateAction(Request $request): Response
    {
        return $this->redirectToRoute('dashboard_index');
    }
}