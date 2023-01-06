<?php

    namespace App\Service\Prospectacion;

    use App\Entity\Prospectacion;
    use App\Repository\ProspectacionRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ProspectacionRegisterService{
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
        public function create(int $Cliente, \DateTime $FechaYHora, int $TipoDeServicio, string $DescripcionDelServicio, int $Usuario, int $Empleado, int $Status, int $Canalizado): Prospectacion{
            $Prospectacion = new Prospectacion($Cliente, $FechaYHora, $TipoDeServicio, $DescripcionDelServicio, $Usuario, $Empleado, $Status, $Canalizado);

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
            $this->accesoService->create('Prospectacion', $Prospectacion->getId(), 2, $data);

            return $Prospectacion;
        }
    }