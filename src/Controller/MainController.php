<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\OpeningHours;
use App\Entity\Pricing;

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

        $contact = ['street' => 'holdu pruskiego'
            ,'city' => 'klodzko'
        ];

        return $this->render('page/home.html.twig', [
            'message' => $message,
            'contact' => $contact,
        ]);
    }

    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        $message = '/contact';

        $openHours = new OpeningHours();
        $openHours->setMonday('6-14');
        $openHours->setTuesday('9-18');

        $contact = ['city' => 'klodzko',
            'street' => 'holdu pruskiego',
        ];

        $phoneNumber = 697160121;

        $hours = ['monday' => $openHours->getMonday(),
            'tuesday' => $openHours->getTuesday(),
        ];

        return $this->render('page/contact.html.twig', [
            'message' => $message,
            'phoneNumber' => $phoneNumber,
            'hours' => $hours,
            'contact' => $contact,
        ]);
    }

    #[Route('/pricing', name: 'pricing')]
    public function pricing(): Response
    {
        $message = '/pricing';

        $pricing = new Pricing();
        $pricing->setMaxPrice(35);
        $pricing->setMinPrice(25);

        return $this->render('page/pricing.html.twig', [
            'message' => $message,
            'pricing' => $pricing,
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

    #[Route('/statute', name: 'statute')]
    public function statute(): Response
    {
        $message = '/statute';

        return $this->render('page/statute.html.twig', [
            'message' => $message,
        ]);
    }
}