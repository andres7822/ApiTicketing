<?php

    namespace App\Api\Action\Empleado;

    use App\Entity\Empleado;
    use App\Service\Empleado\EmpleadoDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private EmpleadoDeleteService $service;

        public function __construct(EmpleadoDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Empleado{
            return $this->service->delete($id);
        }
    }