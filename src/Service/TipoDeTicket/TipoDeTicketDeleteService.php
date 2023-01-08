<?php

namespace App\Service\TipoDeTicket;

use App\Entity\TipoDeTicket;
use App\Repository\TipoDeTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class TipoDeTicketDeleteService{
    private TipoDeTicketRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(TipoDeTicketRepository $repository,
                                systemLogRegisterService $accesoService){
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function delete(int $id): TipoDeTicket{
        $TipoDeTicket = $this->repository->findById($id);
        $data = [
            'TipoTicket' => $TipoDeTicket->getTipoTicket(),
            'DiasLimiteResolucion' => $TipoDeTicket->getDiasLimiteResolucion(),
        ];

        $this->repository->removeEntity($TipoDeTicket);

        $this->accesoService->create('TipoDeTicket', $id, 3, $data);

        return $TipoDeTicket;
    }
}