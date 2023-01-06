<?php

namespace App\Service\TipoDeTicket;

use App\Entity\TipoDeTicket;
use App\Repository\TipoDeTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class TipoDeTicketRegisterService{
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
    public function create(string $TipoDeTicket): TipoDeTicket{
        $TipoDeTicket = new TipoDeTicket($TipoDeTicket);

        $this->repository->save($TipoDeTicket);

        $data = [
            'TipoDeTicket' => $TipoDeTicket->getTipoDeTicket()
        ];
        $this->accesoService->create('TipoDeTicket', $TipoDeTicket->getId(), 2, $data);

        return $TipoDeTicket;
    }
}