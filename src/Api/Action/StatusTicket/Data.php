<?php

namespace App\Api\Action\StatusTicket;

use App\Entity\StatusTicket;
use App\Service\StatusTicket\StatusTicketDataService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class Data{
    private StatusTicketDataService $service;

    public function __construct(StatusTicketDataService $service){
        $this->service = $service;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function __invoke(int $id): StatusTicket{
        return $this->service->data($id);
    }
}