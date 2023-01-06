<?php

    namespace App\Service\TipoDeAsentamiento;

    use App\Entity\TipoDeAsentamiento;
    use App\Repository\TipoDeAsentamientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeAsentamientoUpdateService{
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
        public function update(int $id, string $Nombre): TipoDeAsentamiento{
            $TipoDeAsentamiento = $this->repository->findById($id);
            $TipoDeAsentamiento->setNombre($Nombre);
            $this->repository->save($TipoDeAsentamiento);

            $data = [
                'Nombre' => $TipoDeAsentamiento->getNombre()
            ];
            $this->accesoService->create('TipoDeAsentamiento', $id, 5, $data);

            return $TipoDeAsentamiento;
        }
    }