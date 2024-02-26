<?php

declare(strict_types=1);

namespace App\Controller\Page;

use App\VisitRegister\VisitsRegister;

use App\Repository\ContactRepository;
use App\Repository\OpenHoursRepository;
use App\Repository\PricingRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    public function __construct(
        private VisitsRegister $visitsRegister,
        private ContactRepository $contactRepository,
        private PricingRepository $pricingRepository,
    ){
        $this->visitsRegister->saveVisit();
    }

    #[Route('/{_locale}/index', name: 'index', locale: 'pl')]
    public function index(): Response
    {
        return $this->redirectToRoute('home');
    }

    #[Route('/{_locale}/home', name: 'home', locale: 'pl')]
    public function homeAction(Request $request): Response
    {
        return $this->render('page/home.html.twig', [
            'contact' => $this->contactRepository->findOneContact(),
        ]);
    }

    #[Route('/{_locale}/contact', name: 'contact', locale: 'pl')]
    public function contactAction(OpenHoursRepository $openHoursRepository): Response
    {
        return $this->render('page/contact.html.twig', [
            'daysOpenHours' => $openHoursRepository->findAllDaysOpenHours(),
            'contact' => $this->contactRepository->findOneContact(),
        ]);
    }

    #[Route('/{_locale}/pricing', name: 'pricing', locale: 'pl')]
    public function pricingAction(): Response
    {
        return $this->render('page/pricing.html.twig', [
            'pricing' => $this->pricingRepository->findOnlyOnePricing(),
        ]);
    }

    #[Route('/{_locale}/gallery', name: 'gallery', locale: 'pl')]
    public function galleryAction(): Response
    {
        return $this->render('page/gallery.html.twig');
    }

    #[Route('/{_locale}/statute', name: 'statute', locale: 'pl')]
    public function statuteAction(): Response
    {
        return $this->render('page/statute.html.twig', [
            'contact' => $this->contactRepository->findOneContact(),
            'pricing' => $this->pricingRepository->findOnlyOnePricing(),
        ]);
    }
}