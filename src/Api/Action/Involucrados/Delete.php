<?php

    namespace App\Api\Action\Involucrados;

    use App\Entity\Involucrados;
    use App\Service\Involucrados\InvolucradosDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private InvolucradosDeleteService $service;

        public function __construct(InvolucradosDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Involucrados{
            return $this->service->delete($id);
        }
    }