<?php

namespace App\Service\TipoDeTicket;

use App\Entity\TipoDeTicket;
use App\Repository\TipoDeTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class TipoDeTicketUpdateService{
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
    public function update(int $id, string $TipoDeTickett): TipoDeTicket{
        $TipoDeTicket = $this->repository->findById($id);
        $TipoDeTicket->setTipoDeTicket($TipoDeTickett);
        $this->repository->save($TipoDeTicket);

        $data = [
            'TipoDeTicket' => $TipoDeTicket->getTipoDeTicket()
        ];
        $this->accesoService->create('TipoDeTicket', $id, 5, $data);

        return $TipoDeTicket;
    }
}