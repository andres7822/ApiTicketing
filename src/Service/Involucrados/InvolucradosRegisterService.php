<?php

    namespace App\Service\Involucrados;

    use App\Entity\Involucrados;
    use App\Repository\InvolucradosRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class InvolucradosRegisterService{
        private InvolucradosRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(InvolucradosRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(int $NivelDeParticipacion, int $Ticket, int $Participante, int $Participacion): Involucrados{
            $Involucrados = new Involucrados($NivelDeParticipacion, $Ticket, $Participante, $Participacion);

            $this->repository->save($Involucrados);

            $data = [
                'NivelDeParticipacion' => $Involucrados->getNivelDeParticipacion(),
                'Ticket' => $Involucrados->getTicket(),
                'Participante' => $Involucrados->getParticipante(),
                'Participacion' => $Involucrados->getParticipacion()
            ];
            $this->accesoService->create('Involucrados', $Involucrados->getId(), 2, $data);

            return $Involucrados;
        }
    }