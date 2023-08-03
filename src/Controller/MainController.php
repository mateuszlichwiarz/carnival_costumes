<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig');
    }

    #[Route('/home', name: 'home')]
    public function home(Request $request): Response
    {
        $message = '/home';

        return $this->render('page/home.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {

        $message = '/contact';

        return $this->render('page/contact.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/pricing', name: 'pricing')]
    public function pricing(): Response
    {
        $message = '/pricing';

        return $this->render('page/pricing.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/gallery', name: 'gallery')]
    public function gallery(): Response
    {
        $message = '/gallery';

        return $this->render('page/gallery.html.twig', [
            'message' => $message,
        ]);
    }

    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        $message = '/about';

        return $this->render('page/about.html.twig', [
            'message' => $message,
        ]);
    }
}