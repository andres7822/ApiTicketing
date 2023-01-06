<?php

    namespace App\Api\Action\ClientePersona;

    use App\Entity\ClientePersona;
    use App\Service\ClientePersona\ClientePersonaDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private ClientePersonaDeleteService $service;

        public function __construct(ClientePersonaDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): ClientePersona{
            return $this->service->delete($id);
        }
    }