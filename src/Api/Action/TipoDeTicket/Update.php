<?php

    namespace App\Api\Action\TipoDeTicket;

    use App\Entity\TipoDeTicket;
    use App\Service\TipoDeTicket\TipoDeTicketUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TipoDeTicketUpdateService $service;

        public function __construct(TipoDeTicketUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): TipoDeTicket{
            $TipoTicket = RequestService::getField($request, 'TipoTicket');
            $DiasLimiteResolucion = RequestService::getField($request, 'DiasLimiteResolucion');

            return $this->service->update($id, $TipoTicket, $DiasLimiteResolucion);
        }
    }