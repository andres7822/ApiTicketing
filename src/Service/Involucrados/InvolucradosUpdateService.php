<?php

    namespace App\Service\Involucrados;

    use App\Entity\Involucrados;
    use App\Repository\InvolucradosRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class InvolucradosUpdateService{
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
        public function update(int $id, int $NivelDeParticipacion, int $Ticket, int $Participante, int $Participacion): Involucrados{
            $Involucrados = $this->repository->findById($id);
            $Involucrados->setNivelDeParticipacion($NivelDeParticipacion);
            $Involucrados->setTicket($Ticket);
            $Involucrados->setParticipante($Participante);
            $Involucrados->setParticipacion($Participacion);
            $this->repository->save($Involucrados);

            $data = [
                'NivelDeParticipacion' => $Involucrados->getNivelDeParticipacion(),
                'Ticket' => $Involucrados->getTicket(),
                'Participante' => $Involucrados->getParticipante(),
                'Participacion' => $Involucrados->getParticipacion()
            ];
            $this->accesoService->create('Involucrados', $id, 5, $data);

            return $Involucrados;
        }
    }