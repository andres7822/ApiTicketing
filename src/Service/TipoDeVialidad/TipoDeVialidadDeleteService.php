<?php

    namespace App\Service\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Repository\TipoDeVialidadRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeVialidadDeleteService{
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
        public function delete(int $id): TipoDeVialidad{
            $TipoDeVialidad = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeVialidad->getNombre()
            ];

            $this->repository->removeEntity($TipoDeVialidad);

            $this->accesoService->create('TipoDeVialidad', $id, 3, $data);

            return $TipoDeVialidad;
        }
    }