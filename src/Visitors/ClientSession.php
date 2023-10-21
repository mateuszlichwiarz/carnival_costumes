<?php

declare(strict_types= 1);

namespace App\Visitors;

use Symfony\Component\HttpFoundation\RequestStack;

class ClientSession
{
    private $session;

    public function __construct(
        private RequestStack $requestStack
        ){}

    public function startSession()
    {
        $session = $this->requestStack->getSession();
        $this->session = $session;

        $this->setStatus('handled');
    }

    private function setStatus(string $status): void
    {
        $this->session->set($status, true);
    }
}