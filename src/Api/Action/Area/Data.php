<?php

    namespace App\Api\Action\Area;

    use App\Entity\Area;
    use App\Service\Area\AreaDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private AreaDataService $service;

        public function __construct(AreaDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Area{
            return $this->service->data($id);
        }
    }