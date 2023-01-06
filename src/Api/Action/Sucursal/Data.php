<?php

    namespace App\Api\Action\Sucursal;

    use App\Entity\Sucursal;
    use App\Service\Sucursal\SucursalDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private SucursalDataService $service;

        public function __construct(SucursalDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Sucursal{
            return $this->service->data($id);
        }
    }