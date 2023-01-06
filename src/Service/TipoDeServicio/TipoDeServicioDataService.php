<?php

    namespace App\Service\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Repository\TipoDeServicioRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeServicioDataService{
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
        public function data(int $id): TipoDeServicio{
            $TipoDeServicio = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeServicio->getNombre(),
                'Descripcion' => $TipoDeServicio->getDescripcion(),
                'Activo' => $TipoDeServicio->getActivo()
            ];

            $this->accesoService->create('TipoDeServicio', $id, 4, $data);

            return $TipoDeServicio;
        }
    }