<?php

    namespace App\Service\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Repository\TipoDeServicioRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeServicioRegisterService{
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
        public function create(string $Nombre, ?string $Descripcion, int $Activo): TipoDeServicio{
            $TipoDeServicio = new TipoDeServicio($Nombre, $Descripcion, $Activo);

            $this->repository->save($TipoDeServicio);

            $data = [
                'Nombre' => $TipoDeServicio->getNombre(),
                'Descripcion' => $TipoDeServicio->getDescripcion(),
                'Activo' => $TipoDeServicio->getActivo()
            ];
            $this->accesoService->create('TipoDeServicio', $TipoDeServicio->getId(), 2, $data);

            return $TipoDeServicio;
        }
    }