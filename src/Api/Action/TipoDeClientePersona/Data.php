<?php

    namespace App\Api\Action\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Service\TipoDeClientePersona\TipoDeClientePersonaDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TipoDeClientePersonaDataService $service;

        public function __construct(TipoDeClientePersonaDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeClientePersona{
            return $this->service->data($id);
        }
    }