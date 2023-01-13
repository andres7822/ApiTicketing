<?php

    namespace App\Api\Action\Notificaci_on;

    use App\Entity\Notificaci_on;
    use App\Service\Notificaci_on\Notificaci_onDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private Notificaci_onDeleteService $service;

        public function __construct(Notificaci_onDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Notificaci_on{
            return $this->service->delete($id);
        }
    }