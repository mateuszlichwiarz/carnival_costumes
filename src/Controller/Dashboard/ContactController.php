<?php

declare(strict_types=1);

namespace App\Controller\Dashboard;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Form\OpenHours\OpenHoursForm;
use App\Form\Contact\ContactUpdateForm;

class ContactController extends AbstractController
{
    public function __construct(
        private OpenHoursForm $openHoursForm,
        private ContactUpdateForm $contactUpdateForm,
    ){}

    #[Route('/dashboard/contact', name: 'dashboard_contact_index')]
    public function updateContactAction(Request $request): Response
    { 
        $this->openHoursForm->createForm();
        $openHours = $this->openHoursForm->handleRequest($request);
        if($openHours !== null) {
            $this->openHoursForm->persist($openHours);
            $this->addFlash('notice', 'Your changes were saved!');

            return $this->redirectToRoute('dashboard_contact_index');
        }
        
        $this->contactUpdateForm->createForms();
        $contact = $this->contactUpdateForm->handleRequest($request);
        if($contact !== null) {
            $this->contactUpdateForm->persist($contact);
            $this->addFlash('notice', 'Your changes were saved!');
            
            return $this->redirectToRoute('dashboard_contact_index');
        }

        return $this->render('dashboard/contact.html.twig', [
            'openHoursForm' => $this->openHoursForm->viewForm(),
            'addressForm'   => $this->contactUpdateForm->viewAddressForm(),
            'phoneForm'     => $this->contactUpdateForm->viewPhoneForm(),
            'daysOpenHours' => $this->openHoursForm->daysContainer()->getAllDays(),
        ]);
    }
}