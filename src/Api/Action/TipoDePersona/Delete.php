<?php

    namespace App\Api\Action\TipoDePersona;

    use App\Entity\TipoDePersona;
    use App\Service\TipoDePersona\TipoDePersonaDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TipoDePersonaDeleteService $service;

        public function __construct(TipoDePersonaDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDePersona{
            return $this->service->delete($id);
        }
    }