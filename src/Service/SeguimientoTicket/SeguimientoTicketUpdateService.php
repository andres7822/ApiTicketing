<?php

namespace App\Service\SeguimientoTicket;

use App\Entity\SeguimientoTicket;
use App\Repository\SeguimientoTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class SeguimientoTicketUpdateService
{
    private SeguimientoTicketRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(SeguimientoTicketRepository $repository,
                                systemLogRegisterService    $accesoService)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function update(int $id, int $Ticket, mixed $FechaYHora, int $Usuario, string $Descripcion, int $Status): SeguimientoTicket
    {
        if (!($FechaYHora instanceof \DateTime)) {
            $FechaYHora = new \DateTime($FechaYHora);
        }
        $SeguimientoTicket = $this->repository->findById($id);
        $SeguimientoTicket->setTicket($Ticket);
        $SeguimientoTicket->setFechaYHora($FechaYHora);
        $SeguimientoTicket->setUsuario($Usuario);
        $SeguimientoTicket->setDescripcion($Descripcion);
        $SeguimientoTicket->setStatus($Status);
        $this->repository->save($SeguimientoTicket);

        $data = [
            'Ticket' => $SeguimientoTicket->getTicket(),
            'FechaYHora' => $SeguimientoTicket->getFechaYHora(),
            'Usuario' => $SeguimientoTicket->getUsuario(),
            'Descripcion' => $SeguimientoTicket->getDescripcion(),
            'Status' => $SeguimientoTicket->getStatus()
        ];
        $this->accesoService->create('SeguimientoTicket', $id, 5, $data);

        return $SeguimientoTicket;
    }
}