<?php

    namespace App\Api\Action\SeguimientoTicket;

    use App\Entity\SeguimientoTicket;
    use App\Service\SeguimientoTicket\SeguimientoTicketUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private SeguimientoTicketUpdateService $service;

        public function __construct(SeguimientoTicketUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): SeguimientoTicket{
            $Ticket = RequestService::getField($request, 'Ticket');
            $FechaYHora = RequestService::getField($request, 'FechaYHora');
            $Usuario = RequestService::getField($request, 'Usuario');
            $Descripcion = RequestService::getField($request, 'Descripcion');
            $Status = RequestService::getField($request, 'Status');

            return $this->service->update($id, $Ticket, $FechaYHora, $Usuario, $Descripcion, $Status);
        }
    }