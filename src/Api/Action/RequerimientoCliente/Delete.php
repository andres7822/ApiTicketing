<?php

    namespace App\Api\Action\RequerimientoCliente;

    use App\Entity\RequerimientoCliente;
    use App\Service\RequerimientoCliente\RequerimientoClienteDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private RequerimientoClienteDeleteService $service;

        public function __construct(RequerimientoClienteDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): RequerimientoCliente{
            return $this->service->delete($id);
        }
    }