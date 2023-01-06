<?php

namespace App\Service\ParticipacionTicket;

use App\Entity\ParticipacionTicket;
use App\Repository\ParticipacionTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class ParticipacionTicketUpdateService{
    private ParticipacionTicketRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(ParticipacionTicketRepository $repository,
                                systemLogRegisterService $accesoService){
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function update(int $id, string $Descripcion): ParticipacionTicket{
        $ParticipacionTicket = $this->repository->findById($id);
        $ParticipacionTicket->setDescripcion($Descripcion);
        $this->repository->save($ParticipacionTicket);

        $data = [
            'Descripcion' => $ParticipacionTicket->getDescripcion()
        ];
        $this->accesoService->create('ParticipacionTicket', $id, 5, $data);

        return $ParticipacionTicket;
    }
}