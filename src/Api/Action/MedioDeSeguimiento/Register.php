<?php

    namespace App\Api\Action\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Service\MedioDeSeguimiento\MedioDeSeguimientoRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private MedioDeSeguimientoRegisterService $service;

        public function __construct(MedioDeSeguimientoRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): MedioDeSeguimiento{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);

            return $this->service->create($Nombre, $Descripcion);
        }
    }