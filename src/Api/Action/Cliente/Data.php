<?php

    namespace App\Api\Action\Cliente;

    use App\Entity\Cliente;
    use App\Service\Cliente\ClienteDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private ClienteDataService $service;

        public function __construct(ClienteDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Cliente{
            return $this->service->data($id);
        }
    }