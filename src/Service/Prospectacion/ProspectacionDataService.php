<?php

    namespace App\Service\Prospectacion;

    use App\Entity\Prospectacion;
    use App\Repository\ProspectacionRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ProspectacionDataService{
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
        public function data(int $id): Prospectacion{
            $Prospectacion = $this->repository->findById($id);
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

            $this->accesoService->create('Prospectacion', $id, 4, $data);

            return $Prospectacion;
        }
    }