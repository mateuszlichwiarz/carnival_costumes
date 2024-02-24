<?php

declare(strict_types=1);

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractController
{
    private readonly UserInterface $admin;

    public function __construct(private Security $security)
    {
        $this->admin = $this->security->getUser();
    }

    #[Route('/dashboard', name: 'dashboard_index')]
    public function indexAction()
    {
        return $this->render('dashboard/index.html.twig', [
            'admin' => $this->admin,
        ]);
    }
}