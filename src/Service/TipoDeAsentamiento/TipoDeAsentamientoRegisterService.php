<?php

    namespace App\Service\TipoDeAsentamiento;

    use App\Entity\TipoDeAsentamiento;
    use App\Repository\TipoDeAsentamientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeAsentamientoRegisterService{
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
        public function create(string $Nombre): TipoDeAsentamiento{
            $TipoDeAsentamiento = new TipoDeAsentamiento($Nombre);

            $this->repository->save($TipoDeAsentamiento);

            $data = [
                'Nombre' => $TipoDeAsentamiento->getNombre()
            ];
            $this->accesoService->create('TipoDeAsentamiento', $TipoDeAsentamiento->getId(), 2, $data);

            return $TipoDeAsentamiento;
        }
    }