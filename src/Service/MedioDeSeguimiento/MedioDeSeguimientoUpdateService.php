<?php

    namespace App\Service\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Repository\MedioDeSeguimientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MedioDeSeguimientoUpdateService{
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
        public function update(int $id, string $Nombre, ?string $Descripcion): MedioDeSeguimiento{
            $MedioDeSeguimiento = $this->repository->findById($id);
            $MedioDeSeguimiento->setNombre($Nombre);
            $MedioDeSeguimiento->setDescripcion($Descripcion);
            $this->repository->save($MedioDeSeguimiento);

            $data = [
                'Nombre' => $MedioDeSeguimiento->getNombre(),
                'Descripcion' => $MedioDeSeguimiento->getDescripcion()
            ];
            $this->accesoService->create('MedioDeSeguimiento', $id, 5, $data);

            return $MedioDeSeguimiento;
        }
    }