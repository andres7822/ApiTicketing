<?php

    namespace App\Service\SeguimientoTicket;

    use App\Entity\SeguimientoTicket;
    use App\Repository\SeguimientoTicketRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

    class SeguimientoTicketRegisterService{
        private SeguimientoTicketRepository $repository;
        private systemLogRegisterService $accesoService;
        private TokenStorageInterface $tokenStorage;


        public function __construct(SeguimientoTicketRepository $repository,
                                    systemLogRegisterService $accesoService,
                                    TokenStorageInterface $tokenStorage){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
            $this->tokenStorage = $tokenStorage;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(int $Ticket, mixed $FechaYHora, ?int $Usuario, string $Descripcion, int $Status): SeguimientoTicket{
            if(!($FechaYHora instanceof \DateTime)){
                $FechaYHora = new \DateTime($FechaYHora);
            }
            if ($Usuario == null) {
                $Usuario = $this->tokenStorage->getToken()?->getUser()?->getId();
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