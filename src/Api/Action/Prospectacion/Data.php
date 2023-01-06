<?php

    namespace App\Api\Action\Prospectacion;

    use App\Entity\Prospectacion;
    use App\Service\Prospectacion\ProspectacionDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private ProspectacionDataService $service;

        public function __construct(ProspectacionDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Prospectacion{
            return $this->service->data($id);
        }
    }