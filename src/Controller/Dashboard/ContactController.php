<?php

declare(strict_types=1);

namespace App\Controller\Dashboard;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\OpenHoursForm\OpenHoursForm;

class ContactController extends AbstractController
{
    public function __construct(
        private OpenHoursForm $openHoursForm,
    ){}

    #[Route('/dashboard/contact', name: 'dashboard_contact_index')]
    public function updateContactAction(Request $request): Response
    { 
        $this->openHoursForm->createForm();
        $openHours = $this->openHoursForm->handleRequest($request);
        if($openHours !== null) {
            $this->openHoursForm->persist($openHours);
            return $this->redirectToRoute('dashboard_contact_index');
        }
        
        return $this->render('dashboard/contact.html.twig', [
            'form' => $this->openHoursForm->viewForm(),
            'daysOpenHours' => $this->openHoursForm->daysContainer()->getAllDays(),
        ]);
    }
}