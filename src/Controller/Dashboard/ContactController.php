<?php

declare(strict_types=1);

namespace App\Controller\Dashboard;

use App\Repository\OpenHoursRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\OpenHours;

use App\Form\Type\UpdateOpenHoursType;
use Doctrine\ORM\EntityManagerInterface;

class ContactController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private OpenHoursRepository $openHoursRepository,
    ){}

    #[Route('/dashboard/contact', name: 'dashboard_contact_index')]
    public function updateContactAction(Request $request): Response
    {
        $openHours = new OpenHours();
        $form = $this->createForm(UpdateOpenHoursType::class, $openHours);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $openHours = $form->getData();
            $foundOpenHoursDay = $this->openHoursRepository->findDayOpenHours($openHours->getDay());
            if($foundOpenHoursDay !== null) {
                $foundOpenHoursDay
                    ->setEndDate($openHours->getEndDate())
                    ->setStartDate($openHours->getStartDate())
                    ->setIsClosed($openHours->getIsClosed())
                ;
                $this->entityManager->persist($foundOpenHoursDay);
            }else{
                $this->entityManager->persist($openHours);
            }
            $this->entityManager->flush();
            return $this->redirectToRoute('dashboard_contact_index');
        }

        return $this->render('dashboard/contact.html.twig', [
            'form' => $form,
            'daysOpenHours' => $this->openHoursRepository->findAllDaysOpenHours()
        ]);
    }
}