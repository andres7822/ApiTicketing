<?php

    namespace App\Api\Action\TipoDeNotificaci_on;

    use App\Entity\TipoDeNotificaci_on;
    use App\Service\TipoDeNotificaci_on\TipoDeNotificaci_onDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TipoDeNotificaci_onDeleteService $service;

        public function __construct(TipoDeNotificaci_onDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeNotificaci_on{
            return $this->service->delete($id);
        }
    }