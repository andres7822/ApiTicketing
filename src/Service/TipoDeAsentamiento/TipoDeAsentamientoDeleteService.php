<?php

    namespace App\Service\TipoDeAsentamiento;

    use App\Entity\TipoDeAsentamiento;
    use App\Repository\TipoDeAsentamientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeAsentamientoDeleteService{
        private TipoDeAsentamientoRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDeAsentamientoRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): TipoDeAsentamiento{
            $TipoDeAsentamiento = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeAsentamiento->getNombre()
            ];

            $this->repository->removeEntity($TipoDeAsentamiento);

            $this->accesoService->create('TipoDeAsentamiento', $id, 3, $data);

            return $TipoDeAsentamiento;
        }
    }