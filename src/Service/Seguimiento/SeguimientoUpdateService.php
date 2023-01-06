<?php

    namespace App\Service\Seguimiento;

    use App\Entity\Seguimiento;
    use App\Repository\SeguimientoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class SeguimientoUpdateService{
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
        public function update(int $id, \DateTime $FechaYHora, string $Descripcion, string $Conclusiones, int $Status, int $Empleado, int $Medio, int $Prospectacion): Seguimiento{
            $Seguimiento = $this->repository->findById($id);
            $Seguimiento->setFechaYHora($FechaYHora);
            $Seguimiento->setDescripcion($Descripcion);
            $Seguimiento->setConclusiones($Conclusiones);
            $Seguimiento->setStatus($Status);
            $Seguimiento->setEmpleado($Empleado);
            $Seguimiento->setMedio($Medio);
            $Seguimiento->setProspectacion($Prospectacion);
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
            $this->accesoService->create('Seguimiento', $id, 5, $data);

            return $Seguimiento;
        }
    }