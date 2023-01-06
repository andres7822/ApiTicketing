<?php

    namespace App\Api\Action\ParticipacionTicket;

    use App\Entity\ParticipacionTicket;
    use App\Service\ParticipacionTicket\ParticipacionTicketRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private ParticipacionTicketRegisterService $service;

        public function __construct(ParticipacionTicketRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): ParticipacionTicket{
            $Descripcion = RequestService::getField($request, 'Descripcion');

            return $this->service->create($Descripcion);
        }
    }