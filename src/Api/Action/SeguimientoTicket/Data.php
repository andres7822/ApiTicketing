<?php

    namespace App\Api\Action\SeguimientoTicket;

    use App\Entity\SeguimientoTicket;
    use App\Service\SeguimientoTicket\SeguimientoTicketDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private SeguimientoTicketDataService $service;

        public function __construct(SeguimientoTicketDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): SeguimientoTicket{
            return $this->service->data($id);
        }
    }