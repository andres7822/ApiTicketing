<?php

    namespace App\Service\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Repository\MedioDeSeguimientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MedioDeSeguimientoDeleteService{
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
        public function delete(int $id): MedioDeSeguimiento{
            $MedioDeSeguimiento = $this->repository->findById($id);
            $data = [
                'Nombre' => $MedioDeSeguimiento->getNombre(),
                'Descripcion' => $MedioDeSeguimiento->getDescripcion()
            ];

            $this->repository->removeEntity($MedioDeSeguimiento);

            $this->accesoService->create('MedioDeSeguimiento', $id, 3, $data);

            return $MedioDeSeguimiento;
        }
    }