<?php

    namespace App\Api\Action\Ticket;

    use App\Entity\Ticket;
    use App\Service\Ticket\TicketDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TicketDataService $service;

        public function __construct(TicketDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Ticket{
            return $this->service->data($id);
        }
    }