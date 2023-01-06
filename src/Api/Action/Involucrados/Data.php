<?php

    namespace App\Api\Action\Involucrados;

    use App\Entity\Involucrados;
    use App\Service\Involucrados\InvolucradosDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private InvolucradosDataService $service;

        public function __construct(InvolucradosDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Involucrados{
            return $this->service->data($id);
        }
    }