<?php

    namespace App\Api\Action\Sucursal;

    use App\Entity\Sucursal;
    use App\Service\Sucursal\SucursalRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private SucursalRegisterService $service;

        public function __construct(SucursalRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Sucursal{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->create($Nombre);
        }
    }