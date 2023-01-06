<?php

    namespace App\Api\Action\Empresa;

    use App\Entity\Empresa;
    use App\Service\Empresa\EmpresaDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private EmpresaDeleteService $service;

        public function __construct(EmpresaDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Empresa{
            return $this->service->delete($id);
        }
    }