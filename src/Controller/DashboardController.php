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

use App\Entity\Admin;

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
    public function visitsInfoAction(
        Request $request,
        null|string $visitsDate = null
        ): Response
        {

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

        return $this->render('admin/visits.html.twig', [
            'admin' => $this->admin,
            'date' => $date->stringDateFormat(),
            'form' => $form,
            'sumWeekVisits' => $this->visitsRepository->sumWeekVisits($date),
            'sumMonthVisits' => $this->visitsRepository->sumMonthVisits($date),
            'sumYearVisits' => $this->visitsRepository->sumYearVisits($date),
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