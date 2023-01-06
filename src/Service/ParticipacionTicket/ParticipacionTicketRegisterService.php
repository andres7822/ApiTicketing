<?php

namespace App\Service\ParticipacionTicket;

use App\Entity\ParticipacionTicket;
use App\Repository\ParticipacionTicketRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class ParticipacionTicketRegisterService
{
    private ParticipacionTicketRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(ParticipacionTicketRepository $repository,
                                systemLogRegisterService      $accesoService)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function create(string $Descripcion): ParticipacionTicket
    {
        $ParticipacionTicket = new ParticipacionTicket($Descripcion);

        $this->repository->save($ParticipacionTicket);

        $data = [
            'Descripcion' => $ParticipacionTicket->getDescripcion(),
        ];
        $this->accesoService->create('ParticipacionTicket', $ParticipacionTicket->getId(), 2, $data);

        return $ParticipacionTicket;
    }
}