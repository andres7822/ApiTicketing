<?php

    namespace App\Service\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Repository\TipoDeServicioRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeServicioDeleteService{
        private TipoDeServicioRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDeServicioRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): TipoDeServicio{
            $TipoDeServicio = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeServicio->getNombre(),
                'Descripcion' => $TipoDeServicio->getDescripcion(),
                'Activo' => $TipoDeServicio->getActivo()
            ];

            $this->repository->removeEntity($TipoDeServicio);

            $this->accesoService->create('TipoDeServicio', $id, 3, $data);

            return $TipoDeServicio;
        }
    }