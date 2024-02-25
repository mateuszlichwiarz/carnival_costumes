<?php

declare(strict_types=1);

namespace App\Controller\Page;

use App\Repository\OpenHoursRepository;
use App\Repository\PricingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\OpenHours;
use App\Entity\Pricing;

use App\VisitRegister\VisitsRegister;


class MainController extends AbstractController
{
    public function __construct(
        private VisitsRegister $visitsRegister,
    ){
        $this->visitsRegister->saveVisit();
    }

    #[Route('/index', name: 'index')]
    public function index(Request $request): Response
    {
        $session = $request->getSession();

        return $this->redirectToRoute('home');
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
    public function contact(
        OpenHoursRepository $openHoursRepository
    ): Response
    {
        return $this->render('page/contact.html.twig', [
            'daysOpenHours' => $openHoursRepository->findAllDaysOpenHours(),
        ]);
    }

    #[Route('/pricing', name: 'pricing')]
    public function pricing(
        PricingRepository $pricingRepository
        ): Response
    {
        return $this->render('page/pricing.html.twig', [
            'pricing' => $pricingRepository->findOnlyOnePricing(),
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