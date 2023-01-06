<?php

    namespace App\Service\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Repository\MedioDeSeguimientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MedioDeSeguimientoDataService{
        private MedioDeSeguimientoRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(MedioDeSeguimientoRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function data(int $id): MedioDeSeguimiento{
            $MedioDeSeguimiento = $this->repository->findById($id);
            $data = [
                'Nombre' => $MedioDeSeguimiento->getNombre(),
                'Descripcion' => $MedioDeSeguimiento->getDescripcion()
            ];

            $this->accesoService->create('MedioDeSeguimiento', $id, 4, $data);

            return $MedioDeSeguimiento;
        }
    }