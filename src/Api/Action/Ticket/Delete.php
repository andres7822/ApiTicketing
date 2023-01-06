<?php

    namespace App\Api\Action\Ticket;

    use App\Entity\Ticket;
    use App\Service\Ticket\TicketDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TicketDeleteService $service;

        public function __construct(TicketDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Ticket{
            return $this->service->delete($id);
        }
    }