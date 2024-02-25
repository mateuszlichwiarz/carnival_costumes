<?php

declare(strict_types=1);

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\Pricing;
use App\Form\Type\UpdatePricingType;

use App\Repository\PricingRepository;

class PricingController extends AbstractController
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private PricingRepository $pricingRepository,
        )
    {}

    #[Route('/dashboard/pricing', name: 'dashboard_pricing')]
    public function updatePricingAction(Request $request): Response
    {
        $pricing = new Pricing();

        $pricingFound = $this->pricingRepository->findOnlyOnePricing();

        $form = $this->createForm(UpdatePricingType::class, $pricing);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $pricing = $form->getData();

            if($pricingFound === null) {
                $this->entityManager->persist($pricing);
            }else{
                $this->entityManager->persist(
                    $pricingFound
                        ->setMinPrice($pricing->getMinPrice())
                        ->setMaxPrice($pricing->getMaxPrice())
                        ->setDeposit($pricing->getDeposit())
                );
            }
            $this->entityManager->flush();
            return $this->redirectToRoute('dashboard_pricing');
        }

        return $this->render('dashboard/pricing.html.twig', [
            'form' => $form,
            'pricing' => $pricingFound,
        ]);
    }
}