<?php

    namespace App\Api\Action\Empleado;

    use App\Entity\Empleado;
    use App\Service\Empleado\EmpleadoRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private EmpleadoRegisterService $service;

        public function __construct(EmpleadoRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Empleado{
            $Clave = RequestService::getField($request, 'Clave');
            $Persona = RequestService::getField($request, 'Persona');

            return $this->service->create($Clave, $Persona);
        }
    }