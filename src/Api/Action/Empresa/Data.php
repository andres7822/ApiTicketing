<?php

    namespace App\Api\Action\Empresa;

    use App\Entity\Empresa;
    use App\Service\Empresa\EmpresaDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private EmpresaDataService $service;

        public function __construct(EmpresaDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Empresa{
            return $this->service->data($id);
        }
    }