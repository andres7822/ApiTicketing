<?php

    namespace App\Api\Action\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Service\StatusCondicionComercial\StatusCondicionComercialDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private StatusCondicionComercialDeleteService $service;

        public function __construct(StatusCondicionComercialDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): StatusCondicionComercial{
            return $this->service->delete($id);
        }
    }