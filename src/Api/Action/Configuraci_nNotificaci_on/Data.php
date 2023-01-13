<?php

    namespace App\Api\Action\Configuraci_nNotificaci_on;

    use App\Entity\Configuraci_nNotificaci_on;
    use App\Service\Configuraci_nNotificaci_on\Configuraci_nNotificaci_onDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private Configuraci_nNotificaci_onDataService $service;

        public function __construct(Configuraci_nNotificaci_onDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Configuraci_nNotificaci_on{
            return $this->service->data($id);
        }
    }