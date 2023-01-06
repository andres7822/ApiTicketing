<?php

    namespace App\Service\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Repository\TipoDeVialidadRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeVialidadDataService{
        private TipoDeVialidadRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDeVialidadRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function data(int $id): TipoDeVialidad{
            $TipoDeVialidad = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeVialidad->getNombre()
            ];

            $this->accesoService->create('TipoDeVialidad', $id, 4, $data);

            return $TipoDeVialidad;
        }
    }