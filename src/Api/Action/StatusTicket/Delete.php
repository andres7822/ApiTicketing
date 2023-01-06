<?php

namespace App\Api\Action\StatusTicket;

use App\Entity\StatusTicket;
use App\Service\StatusTicket\StatusTicketDeleteService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class Delete{
    private StatusTicketDeleteService $service;

    public function __construct(StatusTicketDeleteService $service){
        $this->service = $service;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function __invoke(int $id): StatusTicket{
        return $this->service->delete($id);
    }
}