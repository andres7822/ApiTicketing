<?php

    namespace App\Api\Action\Configuraci_nNotificaci_on;

    use App\Entity\Configuraci_nNotificaci_on;
    use App\Service\Configuraci_nNotificaci_on\Configuraci_nNotificaci_onDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private Configuraci_nNotificaci_onDeleteService $service;

        public function __construct(Configuraci_nNotificaci_onDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Configuraci_nNotificaci_on{
            return $this->service->delete($id);
        }
    }