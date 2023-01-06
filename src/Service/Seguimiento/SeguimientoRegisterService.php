<?php

    namespace App\Service\Seguimiento;

    use App\Entity\Seguimiento;
    use App\Repository\SeguimientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class SeguimientoRegisterService{
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
        public function create(\DateTime $FechaYHora, string $Descripcion, string $Conclusiones, int $Status, int $Empleado, int $Medio, int $Prospectacion): Seguimiento{
            $Seguimiento = new Seguimiento($FechaYHora, $Descripcion, $Conclusiones, $Status, $Empleado, $Medio, $Prospectacion);

            $this->repository->save($Seguimiento);

            $data = [
                'FechaYHora' => $Seguimiento->getFechaYHora(),
                'Descripcion' => $Seguimiento->getDescripcion(),
                'Conclusiones' => $Seguimiento->getConclusiones(),
                'Status' => $Seguimiento->getStatus(),
                'Empleado' => $Seguimiento->getEmpleado(),
                'Medio' => $Seguimiento->getMedio(),
                'Prospectacion' => $Seguimiento->getProspectacion()
            ];
            $this->accesoService->create('Seguimiento', $Seguimiento->getId(), 2, $data);

            return $Seguimiento;
        }
    }