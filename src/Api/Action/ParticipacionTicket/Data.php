<?php

    namespace App\Api\Action\ParticipacionTicket;

    use App\Entity\ParticipacionTicket;
    use App\Service\ParticipacionTicket\ParticipacionTicketDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private ParticipacionTicketDataService $service;

        public function __construct(ParticipacionTicketDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): ParticipacionTicket{
            return $this->service->data($id);
        }
    }