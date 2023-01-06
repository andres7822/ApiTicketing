<?php

    namespace App\Service\Involucrados;

    use App\Entity\Involucrados;
    use App\Repository\InvolucradosRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class InvolucradosDeleteService{
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
        public function delete(int $id): Involucrados{
            $Involucrados = $this->repository->findById($id);
            $data = [
                'NivelDeParticipacion' => $Involucrados->getNivelDeParticipacion(),
                'Ticket' => $Involucrados->getTicket(),
                'Participante' => $Involucrados->getParticipante(),
                'Participacion' => $Involucrados->getParticipacion()
            ];

            $this->repository->removeEntity($Involucrados);

            $this->accesoService->create('Involucrados', $id, 3, $data);

            return $Involucrados;
        }
    }