<?php

    namespace App\Service\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Repository\MedioDeSeguimientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MedioDeSeguimientoRegisterService{
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
        public function create(string $Nombre, ?string $Descripcion): MedioDeSeguimiento{
            $MedioDeSeguimiento = new MedioDeSeguimiento($Nombre, $Descripcion);

            $this->repository->save($MedioDeSeguimiento);

            $data = [
                'Nombre' => $MedioDeSeguimiento->getNombre(),
                'Descripcion' => $MedioDeSeguimiento->getDescripcion()
            ];
            $this->accesoService->create('MedioDeSeguimiento', $MedioDeSeguimiento->getId(), 2, $data);

            return $MedioDeSeguimiento;
        }
    }