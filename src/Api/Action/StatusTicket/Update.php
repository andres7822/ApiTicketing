<?php

namespace App\Api\Action\StatusTicket;

use App\Entity\StatusTicket;
use App\Service\StatusTicket\StatusTicketUpdateService;
use App\Service\Request\RequestService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpFoundation\Request;

class Update{
    private StatusTicketUpdateService $service;

    public function __construct(StatusTicketUpdateService $service){
        $this->service = $service;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function __invoke(int $id, Request $request): StatusTicket{
        $Nombre = RequestService::getField($request, 'Nombre');
        $Descripcion = RequestService::getField($request, 'Descripcion', false);
        $Acotacion = RequestService::getField($request, 'Acotacion', false);

        return $this->service->update($id, $Nombre, $Descripcion, $Acotacion);
    }
}