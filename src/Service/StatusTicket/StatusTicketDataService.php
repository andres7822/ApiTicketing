<?php

namespace App\Service\StatusTicket;

use App\Entity\StatusTicket;
use App\Repository\StatusTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class StatusTicketDataService
{
    private StatusTicketRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(StatusTicketRepository $repository,
                                systemLogRegisterService      $accesoService)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function data(int $id): StatusTicket
    {
        $StatusTicket = $this->repository->findById($id);
        $data = [
            'Nombre' => $StatusTicket->getNombre(),
            'Descripcion' => $StatusTicket->getDescripcion(),
            'Acotacion' => $StatusTicket->getAcotacion()
        ];

        $this->accesoService->create('StatusTicket', $id, 4, $data);

        return $StatusTicket;
    }
}