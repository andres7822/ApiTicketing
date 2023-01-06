<?php

    namespace App\Api\Action\TipoDeTicket;

    use App\Entity\TipoDeTicket;
    use App\Service\TipoDeTicket\TipoDeTicketDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TipoDeTicketDeleteService $service;

        public function __construct(TipoDeTicketDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeTicket{
            return $this->service->delete($id);
        }
    }