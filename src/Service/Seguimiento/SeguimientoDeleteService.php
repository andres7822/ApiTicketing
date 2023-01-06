<?php

    namespace App\Service\Seguimiento;

    use App\Entity\Seguimiento;
    use App\Repository\SeguimientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class SeguimientoDeleteService{
        private SeguimientoRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(SeguimientoRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): Seguimiento{
            $Seguimiento = $this->repository->findById($id);
            $data = [
                'FechaYHora' => $Seguimiento->getFechaYHora(),
                'Descripcion' => $Seguimiento->getDescripcion(),
                'Conclusiones' => $Seguimiento->getConclusiones(),
                'Status' => $Seguimiento->getStatus(),
                'Empleado' => $Seguimiento->getEmpleado(),
                'Medio' => $Seguimiento->getMedio(),
                'Prospectacion' => $Seguimiento->getProspectacion()
            ];

            $this->repository->removeEntity($Seguimiento);

            $this->accesoService->create('Seguimiento', $id, 3, $data);

            return $Seguimiento;
        }
    }