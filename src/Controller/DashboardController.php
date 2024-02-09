<?php

declare(strict_types=1);

namespace App\Controller;

use App\BetterDate\BetterDate;
use App\BetterDate\BetterDateInterface;
use App\Repository\VisitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\SecurityBundle\Security;

use App\Entity\Admin;

use App\VisitsFinder\VisitsFinderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractController
{
    private UserInterface $admin;

    public function __construct(
        private Security $security,
        private VisitsFinderInterface $visitsFinder,
        private BetterDate $betterDate,
        private VisitsRepository $visitsRepository,
    ) {
        $this->admin = $this->security->getUser();
    }

    #[Route('/admin/info', name: 'admin_info')]
    public function info(Request $request): Response
    {   
        $visitsCollection = $this->visitsRepository->findAllVisits();

        $this->visitsFinder->prepare($visitsCollection);
        $visits = $this->visitsFinder->findWeek($this->betterDate->create())->getVisits();

        return $this->render('admin/info.html.twig', [
            'admin' => $this->admin,
            'visitsInWeek' => $visits,
        ]);
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