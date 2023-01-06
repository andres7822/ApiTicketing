<?php

    namespace App\Api\Action\SeguimientoTicket;

    use App\Entity\SeguimientoTicket;
    use App\Service\SeguimientoTicket\SeguimientoTicketRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private SeguimientoTicketRegisterService $service;

        public function __construct(SeguimientoTicketRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): SeguimientoTicket{
            $Ticket = RequestService::getField($request, 'Ticket');
            $FechaYHora = RequestService::getField($request, 'FechaYHora');
            $Usuario = RequestService::getField($request, 'Usuario');
            $Descripcion = RequestService::getField($request, 'Descripcion');
            $Status = RequestService::getField($request, 'Status');

            return $this->service->create($Ticket, $FechaYHora, $Usuario, $Descripcion, $Status);
        }
    }