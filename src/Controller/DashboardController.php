<?php

declare(strict_types=1);

namespace App\Controller;

use App\BetterDate\BetterDateInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Admin;

use App\VisitsFinder\VisitsFinderInterface;
use App\Repository\VisitsRepository;
use App\VisitsFinder\VisitsFoundCounter;

final class DashboardController extends AbstractController
{
    private UserInterface $admin;

    public function __construct(
        private Security $security,
        private VisitsFinderInterface $visitsFinder,
        private BetterDateInterface $betterDate,
        private VisitsRepository $visitsRepository,
        private VisitsFoundCounter $visitsFoundCounter
    ) {
        $this->admin = $this->security->getUser();
    }

    #[Route('/admin/info', name: 'admin_info')]
    public function visitsInfoAction(): Response
    {   
        $currentDate = $this->betterDate->create('01-01-2022');
        
        return $this->render('admin/info.html.twig', [
            'admin' => $this->admin,
            'date' => $currentDate->getStandardDate(),
            'sumWeekVisits' => $this->visitsRepository->sumWeekVisits($currentDate),
            'sumMonthVisits' => $this->visitsRepository->sumMonthVisits($currentDate),
            'sumYearVisits' => $this->visitsRepository->sumYearVisits($currentDate),
        ]);
    }

    public function pricing(): Response
    {
        return $this->render('admin/pricing.html.twig');
    }

    public function contact()
    {

    }

    public function openingHours()
    {

    }

    public function events()
    {

    }
}