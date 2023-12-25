<?php

declare(strict_types=1);

namespace App\VisitRegister;

use Symfony\Component\HttpFoundation\RequestStack;

class SessionManager
{
    public function __construct(
        private RequestStack $requestStack,
    ){}
    
    public function getRegistered()
    {
        return $this->requestStack->getSession()->get('registered');
    }

}