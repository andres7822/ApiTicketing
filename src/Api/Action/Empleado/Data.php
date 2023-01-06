<?php

    namespace App\Api\Action\Empleado;

    use App\Entity\Empleado;
    use App\Service\Empleado\EmpleadoDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private EmpleadoDataService $service;

        public function __construct(EmpleadoDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Empleado{
            return $this->service->data($id);
        }
    }