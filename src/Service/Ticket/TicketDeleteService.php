<?php

namespace App\Service\Ticket;

use App\Entity\Ticket;
use App\Repository\TicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class TicketDeleteService{
    private TicketRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(TicketRepository $repository,
                                systemLogRegisterService $accesoService){
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function delete(int $id): Ticket{
        $Ticket = $this->repository->findById($id);
        $data = [
            'Folio' => $Ticket->getFolio(),
            'FechaYHora' => $Ticket->getFechaYHora(),
            'Tema' => $Ticket->getTema(),
            'Descripcion' => $Ticket->getDescripcion(),
            'Solicitante' => $Ticket->getSolicitante(),
            'Sucursal' => $Ticket->getSucursal(),
            'Area' => $Ticket->getArea(),
            'FechaCompromiso' => $Ticket->getFechaCompromiso(),
            'Observaciones' => $Ticket->getObservaciones(),
            'Status' => $Ticket->getStatus(),
            'Tipo' => $Ticket->getTipo(),
            'Involucrados' => $Ticket->getInvolucrados()
        ];

        $this->repository->removeEntity($Ticket);

        $this->accesoService->create('Ticket', $id, 3, $data);

        return $Ticket;
    }
}