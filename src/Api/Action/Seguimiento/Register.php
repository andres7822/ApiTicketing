<?php

    namespace App\Api\Action\Seguimiento;

    use App\Entity\Seguimiento;
    use App\Service\Seguimiento\SeguimientoRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private SeguimientoRegisterService $service;

        public function __construct(SeguimientoRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Seguimiento{
            $FechaYHora = RequestService::getField($request, 'FechaYHora');
            $Descripcion = RequestService::getField($request, 'Descripcion');
            $Conclusiones = RequestService::getField($request, 'Conclusiones');
            $Status = RequestService::getField($request, 'Status');
            $Empleado = RequestService::getField($request, 'Empleado');
            $Medio = RequestService::getField($request, 'Medio');
            $Prospectacion = RequestService::getField($request, 'Prospectacion');

            return $this->service->create($FechaYHora, $Descripcion, $Conclusiones, $Status, $Empleado, $Medio, $Prospectacion);
        }
    }