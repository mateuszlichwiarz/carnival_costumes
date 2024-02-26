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
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class MainController extends AbstractController
{
    private ?UserInterface $admin = null;

    public function __construct(
        private VisitsRegister $visitsRegister,
        private ContactRepository $contactRepository,
        private PricingRepository $pricingRepository,
        private Security $security
    ){
        $this->visitsRegister->saveVisit();
        $this->admin = $this->security->getUser();
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
            'admin' => $this->admin,
        ]);
    }

    #[Route('/{_locale}/contact', name: 'contact', locale: 'pl')]
    public function contactAction(OpenHoursRepository $openHoursRepository): Response
    {
        return $this->render('page/contact.html.twig', [
            'daysOpenHours' => $openHoursRepository->findAllDaysOpenHours(),
            'contact' => $this->contactRepository->findOneContact(),
            'admin' => $this->admin,
        ]);
    }

    #[Route('/{_locale}/pricing', name: 'pricing', locale: 'pl')]
    public function pricingAction(): Response
    {
        return $this->render('page/pricing.html.twig', [
            'pricing' => $this->pricingRepository->findOnlyOnePricing(),
            'admin' => $this->admin,
        ]);
    }

    #[Route('/{_locale}/gallery', name: 'gallery', locale: 'pl')]
    public function galleryAction(): Response
    {
        return $this->render('page/gallery.html.twig', ['admin' => $this->admin]);
    }

    #[Route('/{_locale}/statute', name: 'statute', locale: 'pl')]
    public function statuteAction(): Response
    {
        return $this->render('page/statute.html.twig', [
            'pricing' => $this->pricingRepository->findOnlyOnePricing(),
            'admin' => $this->admin,
        ]);
    }
}