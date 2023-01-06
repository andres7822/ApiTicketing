<?php

namespace App\Service\ParticipacionTicket;

use App\Entity\ParticipacionTicket;
use App\Repository\ParticipacionTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class ParticipacionTicketDeleteService{
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
    public function delete(int $id): ParticipacionTicket{
        $ParticipacionTicket = $this->repository->findById($id);
        $data = [
            'Descripcion' => $ParticipacionTicket->getDescripcion(),
        ];

        $this->repository->removeEntity($ParticipacionTicket);

        $this->accesoService->create('ParticipacionTicket', $id, 3, $data);

        return $ParticipacionTicket;
    }
}