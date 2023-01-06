<?php

    namespace App\Api\Action\StatusProspectacion;

    use App\Entity\StatusProspectacion;
    use App\Service\StatusProspectacion\StatusProspectacionDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private StatusProspectacionDataService $service;

        public function __construct(StatusProspectacionDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): StatusProspectacion{
            return $this->service->data($id);
        }
    }