<?php

    namespace App\Service\SeguimientoTicket;

    use App\Entity\SeguimientoTicket;
    use App\Repository\SeguimientoTicketRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class SeguimientoTicketRegisterService{
        private SeguimientoTicketRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(SeguimientoTicketRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(int $Ticket, mixed $FechaYHora, int $Usuario, string $Descripcion, int $Status): SeguimientoTicket{
            if(!($FechaYHora instanceof \DateTime)){
                $FechaYHora = new \DateTime($FechaYHora);
            }
            $SeguimientoTicket = new SeguimientoTicket($Ticket, $FechaYHora, $Usuario, $Descripcion, $Status);

            $this->repository->save($SeguimientoTicket);

            $data = [
                'Ticket' => $SeguimientoTicket->getTicket(),
                'FechaYHora' => $SeguimientoTicket->getFechaYHora(),
                'Usuario' => $SeguimientoTicket->getUsuario(),
                'Descripcion' => $SeguimientoTicket->getDescripcion(),
                'Status' => $SeguimientoTicket->getStatus()
            ];
            $this->accesoService->create('SeguimientoTicket', $SeguimientoTicket->getId(), 2, $data);

            return $SeguimientoTicket;
        }
    }