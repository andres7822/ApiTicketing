<?php

    namespace App\Api\Action\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Service\TipoDeClientePersona\TipoDeClientePersonaDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TipoDeClientePersonaDeleteService $service;

        public function __construct(TipoDeClientePersonaDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeClientePersona{
            return $this->service->delete($id);
        }
    }