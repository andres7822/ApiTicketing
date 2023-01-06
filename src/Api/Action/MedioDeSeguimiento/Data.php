<?php

    namespace App\Api\Action\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Service\MedioDeSeguimiento\MedioDeSeguimientoDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private MedioDeSeguimientoDataService $service;

        public function __construct(MedioDeSeguimientoDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): MedioDeSeguimiento{
            return $this->service->data($id);
        }
    }