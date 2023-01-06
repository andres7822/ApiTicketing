<?php

    namespace App\Api\Action\TipoDeAsentamiento;

    use App\Entity\TipoDeAsentamiento;
    use App\Service\TipoDeAsentamiento\TipoDeAsentamientoDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TipoDeAsentamientoDataService $service;

        public function __construct(TipoDeAsentamientoDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeAsentamiento{
            return $this->service->data($id);
        }
    }