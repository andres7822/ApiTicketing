<?php

    namespace App\Api\Action\Area;

    use App\Entity\Area;
    use App\Service\Area\AreaDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private AreaDeleteService $service;

        public function __construct(AreaDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Area{
            return $this->service->delete($id);
        }
    }