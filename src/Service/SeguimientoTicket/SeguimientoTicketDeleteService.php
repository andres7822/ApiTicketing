<?php

    namespace App\Service\SeguimientoTicket;

    use App\Entity\SeguimientoTicket;
    use App\Repository\SeguimientoTicketRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class SeguimientoTicketDeleteService{
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
        public function delete(int $id): SeguimientoTicket{
            $SeguimientoTicket = $this->repository->findById($id);
            $data = [
                'Ticket' => $SeguimientoTicket->getTicket(),
                'FechaYHora' => $SeguimientoTicket->getFechaYHora(),
                'Usuario' => $SeguimientoTicket->getUsuario(),
                'Descripcion' => $SeguimientoTicket->getDescripcion(),
                'Status' => $SeguimientoTicket->getStatus()
            ];

            $this->repository->removeEntity($SeguimientoTicket);

            $this->accesoService->create('SeguimientoTicket', $id, 3, $data);

            return $SeguimientoTicket;
        }
    }