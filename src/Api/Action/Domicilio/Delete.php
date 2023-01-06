<?php

    namespace App\Api\Action\Domicilio;

    use App\Entity\Domicilio;
    use App\Service\Domicilio\DomicilioDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private DomicilioDeleteService $service;

        public function __construct(DomicilioDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Domicilio{
            return $this->service->delete($id);
        }
    }