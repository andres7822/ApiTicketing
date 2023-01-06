<?php

    namespace App\Api\Action\Prospectacion;

    use App\Entity\Prospectacion;
    use App\Service\Prospectacion\ProspectacionDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private ProspectacionDeleteService $service;

        public function __construct(ProspectacionDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): Prospectacion{
            return $this->service->delete($id);
        }
    }