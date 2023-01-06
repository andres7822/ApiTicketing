<?php

    namespace App\Api\Action\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Service\MedioDeSeguimiento\MedioDeSeguimientoDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private MedioDeSeguimientoDeleteService $service;

        public function __construct(MedioDeSeguimientoDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): MedioDeSeguimiento{
            return $this->service->delete($id);
        }
    }