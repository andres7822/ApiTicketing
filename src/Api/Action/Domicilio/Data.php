<?php

    namespace App\Api\Action\Domicilio;

    use App\Entity\Domicilio;
    use App\Service\Domicilio\DomicilioDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private DomicilioDataService $service;

        public function __construct(DomicilioDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Domicilio{
            return $this->service->data($id);
        }
    }