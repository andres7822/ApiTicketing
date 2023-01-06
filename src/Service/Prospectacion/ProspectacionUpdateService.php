<?php

    namespace App\Service\Prospectacion;

    use App\Entity\Prospectacion;
    use App\Repository\ProspectacionRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ProspectacionUpdateService{
        private ProspectacionRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(ProspectacionRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function update(int $id, int $Cliente, \DateTime $FechaYHora, int $TipoDeServicio, string $DescripcionDelServicio, int $Usuario, int $Empleado, int $Status, int $Canalizado): Prospectacion{
            $Prospectacion = $this->repository->findById($id);
            $Prospectacion->setCliente($Cliente);
            $Prospectacion->setFechaYHora($FechaYHora);
            $Prospectacion->setTipoDeServicio($TipoDeServicio);
            $Prospectacion->setDescripcionDelServicio($DescripcionDelServicio);
            $Prospectacion->setUsuario($Usuario);
            $Prospectacion->setEmpleado($Empleado);
            $Prospectacion->setStatus($Status);
            $Prospectacion->setCanalizado($Canalizado);
            $this->repository->save($Prospectacion);

            $data = [
                'Cliente' => $Prospectacion->getCliente(),
                'FechaYHora' => $Prospectacion->getFechaYHora(),
                'TipoDeServicio' => $Prospectacion->getTipoDeServicio(),
                'DescripcionDelServicio' => $Prospectacion->getDescripcionDelServicio(),
                'Usuario' => $Prospectacion->getUsuario(),
                'Empleado' => $Prospectacion->getEmpleado(),
                'Status' => $Prospectacion->getStatus(),
                'Canalizado' => $Prospectacion->getCanalizado()
            ];
            $this->accesoService->create('Prospectacion', $id, 5, $data);

            return $Prospectacion;
        }
    }