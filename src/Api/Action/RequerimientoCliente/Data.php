<?php

    namespace App\Api\Action\RequerimientoCliente;

    use App\Entity\RequerimientoCliente;
    use App\Service\RequerimientoCliente\RequerimientoClienteDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private RequerimientoClienteDataService $service;

        public function __construct(RequerimientoClienteDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): RequerimientoCliente{
            return $this->service->data($id);
        }
    }