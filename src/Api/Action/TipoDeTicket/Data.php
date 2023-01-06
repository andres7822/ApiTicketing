<?php

    namespace App\Api\Action\TipoDeTicket;

    use App\Entity\TipoDeTicket;
    use App\Service\TipoDeTicket\TipoDeTicketDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TipoDeTicketDataService $service;

        public function __construct(TipoDeTicketDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeTicket{
            return $this->service->data($id);
        }
    }