<?php

declare(strict_types=1);

namespace App\Form\Contact;

use App\Entity\Contact;
use App\Repository\ContactRepository;

use App\Form\Contact\ContactUpdateFormInterface;
use App\Form\Contact\Type\ContactAddressUpdateType;
use App\Form\Contact\Type\ContactPhoneUpdateType;
use App\Form\Contact\Persister\ContactPersister;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

class ContactUpdateForm implements ContactUpdateFormInterface
{
    private Contact|null $foundContact;

    private Contact $contactPhone;

    private Contact $contactAddress;

    private FormInterface $formAddress;

    private FormInterface $formPhone;

    public function __construct(
        private FormFactoryInterface $formFactory,
        private ContactRepository $contactRepository,
        private ContactPersister $contactPersister,
    ){
        $this->foundContact = $this->contactRepository->findOneContact();
    }

    public function createForms(): void
    {
        $this->contactAddress = new Contact();

        $this->formAddress = $this->formFactory->create(
            ContactAddressUpdateType::class,
            $this->contactAddress
        );

        $this->contactPhone = new Contact();

        $this->formPhone = $this->formFactory->create(
            ContactPhoneUpdateType::class,
            $this->contactPhone
        );
    }

    public function handleRequest(Request $request): Contact|null
    {
        $this->formAddress->handleRequest($request);
        $this->formPhone->handleRequest($request);
        if($this->formAddress->isSubmitted() && $this->formAddress->isValid()) {
            $this->contactAddress = $this->formAddress->getData();
            
            if($this->foundContact !== null) {
                return $this->foundContact
                ->setCity($this->contactAddress->getCity())
                ->setStreet($this->contactAddress->getStreet())
                ;
            }else {
                return $this->contactAddress;
            }
            
        }elseif($this->formPhone->isSubmitted() && $this->formPhone->isValid()){
            $this->contactPhone = $this->formPhone->getData();

            if($this->foundContact !== null) {
                return $this->foundContact
                ->setCity($this->contactAddress->getCity())
                ->setStreet($this->contactAddress->getStreet())
                ;
            }else {
                return $this->contactPhone;
            }
        }else {
            return null;
        }
    }

    public function persist(Contact $contact): void
    {
        $this->contactPersister->persist($contact);
    }

    public function viewAddressForm(): FormInterface
    {
        return $this->formAddress;
    }

    public function viewPhoneForm(): FormInterface
    {
        return $this->formPhone;
    }
}