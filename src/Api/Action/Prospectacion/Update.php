<?php

    namespace App\Api\Action\Prospectacion;

    use App\Entity\Prospectacion;
    use App\Service\Prospectacion\ProspectacionUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private ProspectacionUpdateService $service;

        public function __construct(ProspectacionUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Prospectacion{
            $Cliente = RequestService::getField($request, 'Cliente');
            $FechaYHora = RequestService::getField($request, 'FechaYHora');
            $TipoDeServicio = RequestService::getField($request, 'TipoDeServicio');
            $DescripcionDelServicio = RequestService::getField($request, 'DescripcionDelServicio');
            $Usuario = RequestService::getField($request, 'Usuario');
            $Empleado = RequestService::getField($request, 'Empleado');
            $Status = RequestService::getField($request, 'Status');
            $Canalizado = RequestService::getField($request, 'Canalizado');

            return $this->service->update($id, $Cliente, $FechaYHora, $TipoDeServicio, $DescripcionDelServicio, $Usuario, $Empleado, $Status, $Canalizado);
        }
    }