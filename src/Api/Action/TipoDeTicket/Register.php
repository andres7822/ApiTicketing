<?php

namespace App\Api\Action\TipoDeTicket;

use App\Entity\TipoDeTicket;
use App\Service\TipoDeTicket\TipoDeTicketRegisterService;
use App\Service\Request\RequestService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpFoundation\Request;

class Register
{
    private TipoDeTicketRegisterService $service;

    public function __construct(TipoDeTicketRegisterService $service)
    {
        $this->service = $service;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function __invoke(Request $request): TipoDeTicket
    {
        $TipoTicket = RequestService::getField($request, 'TipoTicket');
        $DiasLimiteResolucion = RequestService::getField($request, 'DiasLimiteResolucion');

        return $this->service->create($TipoTicket, $DiasLimiteResolucion);
    }
}