<?php

    namespace App\Api\Action\Notificaci_on;

    use App\Entity\Notificaci_on;
    use App\Service\Notificaci_on\Notificaci_onDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private Notificaci_onDataService $service;

        public function __construct(Notificaci_onDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Notificaci_on{
            return $this->service->data($id);
        }
    }