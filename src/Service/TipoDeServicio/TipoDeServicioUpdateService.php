<?php

    namespace App\Service\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Repository\TipoDeServicioRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeServicioUpdateService{
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
        public function update(int $id, string $Nombre, ?string $Descripcion, int $Activo): TipoDeServicio{
            $TipoDeServicio = $this->repository->findById($id);
            $TipoDeServicio->setNombre($Nombre);
            $TipoDeServicio->setDescripcion($Descripcion);
            $TipoDeServicio->setActivo($Activo);
            $this->repository->save($TipoDeServicio);

            $data = [
                'Nombre' => $TipoDeServicio->getNombre(),
                'Descripcion' => $TipoDeServicio->getDescripcion(),
                'Activo' => $TipoDeServicio->getActivo()
            ];
            $this->accesoService->create('TipoDeServicio', $id, 5, $data);

            return $TipoDeServicio;
        }
    }