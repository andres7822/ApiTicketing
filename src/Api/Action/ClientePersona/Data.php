<?php

    namespace App\Api\Action\ClientePersona;

    use App\Entity\ClientePersona;
    use App\Service\ClientePersona\ClientePersonaDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private ClientePersonaDataService $service;

        public function __construct(ClientePersonaDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): ClientePersona{
            return $this->service->data($id);
        }
    }