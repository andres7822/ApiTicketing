<?php

    namespace App\Api\Action\Sucursal;

    use App\Entity\Sucursal;
    use App\Service\Sucursal\SucursalDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private SucursalDeleteService $service;

        public function __construct(SucursalDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Sucursal{
            return $this->service->delete($id);
        }
    }