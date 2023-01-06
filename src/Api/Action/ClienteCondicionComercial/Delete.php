<?php

    namespace App\Api\Action\ClienteCondicionComercial;

    use App\Entity\ClienteCondicionComercial;
    use App\Service\ClienteCondicionComercial\ClienteCondicionComercialDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private ClienteCondicionComercialDeleteService $service;

        public function __construct(ClienteCondicionComercialDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): ClienteCondicionComercial{
            return $this->service->delete($id);
        }
    }