<?php

    namespace App\Api\Action\StatusProspectacion;

    use App\Entity\StatusProspectacion;
    use App\Service\StatusProspectacion\StatusProspectacionDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private StatusProspectacionDeleteService $service;

        public function __construct(StatusProspectacionDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): StatusProspectacion{
            return $this->service->delete($id);
        }
    }