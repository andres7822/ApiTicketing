<?php

    namespace App\Api\Action\SeguimientoTicket;

    use App\Entity\SeguimientoTicket;
    use App\Service\SeguimientoTicket\SeguimientoTicketDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private SeguimientoTicketDeleteService $service;

        public function __construct(SeguimientoTicketDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): SeguimientoTicket{
            return $this->service->delete($id);
        }
    }