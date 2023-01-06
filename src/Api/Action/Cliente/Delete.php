<?php

    namespace App\Api\Action\Cliente;

    use App\Entity\Cliente;
    use App\Service\Cliente\ClienteDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private ClienteDeleteService $service;

        public function __construct(ClienteDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Cliente{
            return $this->service->delete($id);
        }
    }