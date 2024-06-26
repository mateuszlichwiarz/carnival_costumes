<?php

declare(strict_types=1);

namespace App\Controller\Dashboard;

use Hume\SessionVisitsBundle\Component\DateSystem\Calculator\WeekCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\VisitsFinder\VisitsFinderInterface;
use App\VisitsFinder\VisitsFoundCounter;

use Hume\SessionVisitsBundle\Component\DateSystem\Factory\DateFactory;
use Hume\SessionVisitsBundle\Component\DateSystem\Model\Date;
use Hume\SessionVisitsBundle\Entity\Visits;
use Hume\SessionVisitsBundle\Repository\VisitsRepository;

use App\Form\Type\VisitsSelectType;

final class VisitsController extends AbstractController
{
    private readonly UserInterface $admin;

    private Visits|null $visitsObject = null;

    private int|null $weekVisits = null;

    private int|null $sumVisitsMonth = null;

    private int|null $sumVisitsYear = null;

    public function __construct(
        private Security $security,
        private VisitsFinderInterface $visitsFinder,
        private DateFactory $dateFactory,
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

        if($visitsDate === null) {
            $visitsDate = 'now';
        }
        $date = $this->dateFactory->create($visitsDate);
        
        $form = $this->createForm(VisitsSelectType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $dateFromRequest = $this->dateFactory->create($form->getData()['date']->format('d-m-Y'));

            return $this->redirectToRoute(
                'dashboard_visits_index', [
                    'visitsDate' => $dateFromRequest->convertDateTimeInt()->stringDateFormat()
            ]);
        }

        $this->searchVisitsByDate($date);
        $this->resultSearchResolve($date);

        return $this->render('dashboard/visits.html.twig', [
            'admin' => $this->admin,
            'date' => $date->stringDateFormat(),
            'form' => $form,
            'sumWeekVisits' => $this->weekVisits,
            'sumMonthVisits' => $this->sumVisitsMonth,
            'sumYearVisits' => $this->sumVisitsYear,
        ]);
    }

    private function searchVisitsByDate(Date $date): void
    {
        $this->visitsObject = $this->visitsRepository->findOneVisitsObjectByDate($date);
        $this->sumVisitsMonth = $this->visitsRepository->sumMonthVisits($date);
        $this->sumVisitsYear = $this->visitsRepository->sumYearVisits($date);
    }

    private function resultSearchResolve(Date $date): void
    {
        if( $this->visitsObject === null ||
            $this->sumVisitsMonth === null ||
            $this->sumVisitsYear === null) {
            $this->weekVisits = 0;
            $this->sumVisitsMonth = 0;
            $this->sumVisitsYear = 0;
        }else{
            $this->weekVisits = $this->visitsObject->getVisits();
        }
    }

}