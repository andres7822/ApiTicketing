<?php

    namespace App\Api\Action\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Service\StatusCondicionComercial\StatusCondicionComercialDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private StatusCondicionComercialDataService $service;

        public function __construct(StatusCondicionComercialDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): StatusCondicionComercial{
            return $this->service->data($id);
        }
    }