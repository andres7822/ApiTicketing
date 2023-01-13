<?php

    namespace App\Api\Action\TipoDeNotificaci_on;

    use App\Entity\TipoDeNotificaci_on;
    use App\Service\TipoDeNotificaci_on\TipoDeNotificaci_onDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TipoDeNotificaci_onDataService $service;

        public function __construct(TipoDeNotificaci_onDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeNotificaci_on{
            return $this->service->data($id);
        }
    }