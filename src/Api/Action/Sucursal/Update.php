<?php

    namespace App\Api\Action\Sucursal;

    use App\Entity\Sucursal;
    use App\Service\Sucursal\SucursalUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private SucursalUpdateService $service;

        public function __construct(SucursalUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Sucursal{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->update($id, $Nombre);
        }
    }