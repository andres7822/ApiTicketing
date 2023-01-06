<?php

namespace App\Service\StatusTicket;

use App\Entity\StatusTicket;
use App\Repository\StatusTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class StatusTicketUpdateService{
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
    public function update(int $id, string $Nombre, ?string $Descripcion, ?string $Acotacion): StatusTicket{
        $StatusTicket = $this->repository->findById($id);
        $StatusTicket->setNombre($Nombre);
        $StatusTicket->setDescripcion($Descripcion);
        $StatusTicket->setAcotacion($Acotacion);
        $this->repository->save($StatusTicket);

        $data = [
            'Nombre' => $StatusTicket->getNombre(),
            'Descripcion' => $StatusTicket->getDescripcion(),
            'Acotacion' => $StatusTicket->getAcotacion()
        ];
        $this->accesoService->create('StatusTicket', $id, 5, $data);

        return $StatusTicket;
    }
}