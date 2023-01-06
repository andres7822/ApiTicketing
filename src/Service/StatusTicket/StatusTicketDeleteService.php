<?php

namespace App\Service\StatusTicket;

use App\Entity\StatusTicket;
use App\Repository\StatusTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class StatusTicketDeleteService{
    private StatusTicketRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(StatusTicketRepository $repository,
                                systemLogRegisterService $accesoService){
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function delete(int $id): StatusTicket{
        $StatusTicket = $this->repository->findById($id);
        $data = [
            'Nombre' => $StatusTicket->getNombre(),
            'Descripcion' => $StatusTicket->getDescripcion(),
            'Acotacion' => $StatusTicket->getAcotacion(),
        ];

        $this->repository->removeEntity($StatusTicket);

        $this->accesoService->create('StatusTicket', $id, 3, $data);

        return $StatusTicket;
    }
}