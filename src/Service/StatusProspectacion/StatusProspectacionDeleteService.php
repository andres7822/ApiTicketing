<?php

    namespace App\Service\StatusProspectacion;

    use App\Entity\StatusProspectacion;
    use App\Repository\StatusProspectacionRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class StatusProspectacionDeleteService{
        private StatusProspectacionRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(StatusProspectacionRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): StatusProspectacion{
            $StatusProspectacion = $this->repository->findById($id);
            $data = [
                'Descipcion' => $StatusProspectacion->getDescipcion(),
                'Acotacion' => $StatusProspectacion->getAcotacion(),
                'Origen' => $StatusProspectacion->getOrigen(),
                'Nombre' => $StatusProspectacion->getNombre(),
                'Descripcion' => $StatusProspectacion->getDescripcion()
            ];

            $this->repository->removeEntity($StatusProspectacion);

            $this->accesoService->create('StatusProspectacion', $id, 3, $data);

            return $StatusProspectacion;
        }
    }