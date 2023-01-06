<?php

    namespace App\Api\Action\ClienteCondicionComercial;

    use App\Entity\ClienteCondicionComercial;
    use App\Service\ClienteCondicionComercial\ClienteCondicionComercialDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private ClienteCondicionComercialDataService $service;

        public function __construct(ClienteCondicionComercialDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): ClienteCondicionComercial{
            return $this->service->data($id);
        }
    }