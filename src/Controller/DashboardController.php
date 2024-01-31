<?php

declare(strict_types=1);

namespace App\Controller;

use App\Date\BetterDate;
use App\Date\BetterDateInterface;
use App\Date\Factory\Interface\CustomDateFactoryInterface;
use App\Date\Factory\Interface\DateFactoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\SecurityBundle\Security;

use App\Entity\Admin;

use App\VisitsFinder\VisitsFinder;

class DashboardController extends AbstractController
{
    public function __construct(
        private Security $security,
        private VisitsFinder $visitsFinder,
        private BetterDateInterface $betterDateInterface,
    )
    {}

    #[Route('/admin', name: 'admin_index')]
    public function index(Request $request): Response
    {   
        /** @var Admin $admin */
        $admin = $this->security->getUser();

        return $this->render('admin/index.html.twig', [
            'admin' => $admin,
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