<?php

    namespace App\Api\Action\Seguimiento;

    use App\Entity\Seguimiento;
    use App\Service\Seguimiento\SeguimientoDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private SeguimientoDeleteService $service;

        public function __construct(SeguimientoDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Seguimiento{
            return $this->service->delete($id);
        }
    }