<?php

    namespace App\Api\Action\Seguimiento;

    use App\Entity\Seguimiento;
    use App\Service\Seguimiento\SeguimientoDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private SeguimientoDataService $service;

        public function __construct(SeguimientoDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Seguimiento{
            return $this->service->data($id);
        }
    }