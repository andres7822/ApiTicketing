<?php

    namespace App\Api\Action\DatosFiscales;

    use App\Entity\DatosFiscales;
    use App\Service\DatosFiscales\DatosFiscalesDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private DatosFiscalesDataService $service;

        public function __construct(DatosFiscalesDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): DatosFiscales{
            return $this->service->data($id);
        }
    }