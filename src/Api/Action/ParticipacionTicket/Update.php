<?php

    namespace App\Api\Action\ParticipacionTicket;

    use App\Entity\ParticipacionTicket;
    use App\Service\ParticipacionTicket\ParticipacionTicketUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private ParticipacionTicketUpdateService $service;

        public function __construct(ParticipacionTicketUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): ParticipacionTicket{
            $Descripcion = RequestService::getField($request, 'Descripcion');

            return $this->service->update($id, $Descripcion);
        }
    }