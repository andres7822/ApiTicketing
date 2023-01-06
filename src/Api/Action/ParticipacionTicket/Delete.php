<?php

    namespace App\Api\Action\ParticipacionTicket;

    use App\Entity\ParticipacionTicket;
    use App\Service\ParticipacionTicket\ParticipacionTicketDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private ParticipacionTicketDeleteService $service;

        public function __construct(ParticipacionTicketDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): ParticipacionTicket{
            return $this->service->delete($id);
        }
    }