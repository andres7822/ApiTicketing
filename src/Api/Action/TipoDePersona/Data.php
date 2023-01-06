<?php

    namespace App\Api\Action\TipoDePersona;

    use App\Entity\TipoDePersona;
    use App\Service\TipoDePersona\TipoDePersonaDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TipoDePersonaDataService $service;

        public function __construct(TipoDePersonaDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDePersona{
            return $this->service->data($id);
        }
    }