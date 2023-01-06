<?php

namespace App\Api\Action\StatusTicket;

use App\Entity\StatusTicket;
use App\Service\StatusTicket\StatusTicketRegisterService;
use App\Service\Request\RequestService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpFoundation\Request;

class Register{
    private StatusTicketRegisterService $service;

    public function __construct(StatusTicketRegisterService $service){
        $this->service = $service;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function __invoke(Request $request): StatusTicket{
        $Nombre = RequestService::getField($request, 'Nombre');
        $Descripcion = RequestService::getField($request, 'Descripcion', false);
        $Acotacion = RequestService::getField($request, 'Acotacion', false);

        return $this->service->create($Nombre, $Descripcion, $Acotacion);
    }
}