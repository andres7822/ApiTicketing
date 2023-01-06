<?php

    namespace App\Api\Action\DatosFiscales;

    use App\Entity\DatosFiscales;
    use App\Service\DatosFiscales\DatosFiscalesDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private DatosFiscalesDeleteService $service;

        public function __construct(DatosFiscalesDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): DatosFiscales{
            return $this->service->delete($id);
        }
    }