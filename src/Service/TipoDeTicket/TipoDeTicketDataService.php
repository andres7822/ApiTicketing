<?php

namespace App\Service\TipoDeTicket;

use App\Entity\TipoDeTicket;
use App\Repository\TipoDeTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class TipoDeTicketDataService{
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
    public function data(int $id): TipoDeTicket{
        $TipoDeTicket = $this->repository->findById($id);
        $data = [
            'TipoTicket' => $TipoDeTicket->getTipoTicket(),
            'DiasLimiteResolucion' => $TipoDeTicket->getDiasLimiteResolucion(),
        ];

        $this->accesoService->create('TipoDeTicket', $id, 4, $data);

        return $TipoDeTicket;
    }
}