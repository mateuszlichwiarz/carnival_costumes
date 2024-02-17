<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\BetterDate\BetterDateInterface;
use App\BetterDate\Entity\Date;

use App\VisitsFinder\VisitsFinderInterface;
use App\Repository\VisitsRepository;
use App\VisitsFinder\VisitsFoundCounter;

use App\Form\Type\SelectVisitsType;

final class DashboardController extends AbstractController
{
    private readonly UserInterface $admin;

    public function __construct(
        private Security $security,
        private VisitsFinderInterface $visitsFinder,
        private BetterDateInterface $betterDate,
        private VisitsRepository $visitsRepository,
        private VisitsFoundCounter $visitsFoundCounter,
    ) {
        $this->admin = $this->security->getUser();
    }

    #[Route('/dashboard/visits/{visitsDate}', name: 'dashboard_visits_index')]
    public function visitsIndexAction(
        Request $request,
        null|string $visitsDate = null
        ): Response {
        
        $date = $this->betterDate->create($visitsDate);

        $form = $this->createForm(SelectVisitsType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $dateFromRequest = new Date($form->getData()['date']);
            
            return $this->redirectToRoute(
                'dashboard_visits_index', [
                    'visitsDate' => $dateFromRequest->stringDateFormat()
            ]);
        }

        $visitsObject = $this->visitsRepository->findOneVisitsObjectByDate($date);
        $sumVisitsMonth = $this->visitsRepository->sumMonthVisits($date);
        $sumVisitsYear = $this->visitsRepository->sumYearVisits($date);

        if($visitsObject === null ||
        $sumVisitsMonth === null ||
        $sumVisitsYear === null) {
            $this->addFlash(
                'warning',
                'None visits in this period',
            );
            $weekVisits = 0;
            $sumVisitsMonth = 0;
            $sumVisitsYear = 0;
        }else{
            $weekVisits = $visitsObject->getVisits();
            $this->addFlash(
                'success',
                'Visits was found',
            );
        }

        return $this->render('dashboard/visits.html.twig', [
            'admin' => $this->admin,
            'date' => $date->stringDateFormat(),
            'form' => $form,
            'sumWeekVisits' => $weekVisits,
            'sumMonthVisits' => $sumVisitsMonth,
            'sumYearVisits' => $sumVisitsYear,
        ]);
    }

    public function pricing(): Response
    {
        return $this->render('dashboard/pricing.html.twig');
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