<?php

    namespace App\Api\Action\Ticket;

    use App\Entity\Ticket;
    use App\Service\Ticket\TicketUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TicketUpdateService $service;

        public function __construct(TicketUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Ticket{
            $Folio = RequestService::getField($request, 'Folio');
            $FechaYHora = RequestService::getField($request, 'FechaYHora');
            $Tema = RequestService::getField($request, 'Tema', false);
            $Descripcion = RequestService::getField($request, 'Descripcion');
            $Solicitante = RequestService::getField($request, 'Solicitante', false);
            $Sucursal = RequestService::getField($request, 'Sucursal');
            $Area = RequestService::getField($request, 'Area');
            $FechaCompromiso = RequestService::getField($request, 'FechaCompromiso', false);
            $Observaciones = RequestService::getField($request, 'Observaciones', false);
            $Status = RequestService::getField($request, 'Status');
            $Tipo = RequestService::getField($request, 'Tipo');
            $Involucrados = RequestService::getField($request, 'Involucrados', false);

            return $this->service->update($id, $Folio, $FechaYHora, $Tema, $Descripcion, $Solicitante, $Sucursal, $Area, $FechaCompromiso, $Observaciones, $Status, $Tipo, $Involucrados);
        }
    }