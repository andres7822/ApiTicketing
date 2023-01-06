<?php

    namespace App\Api\Action\TipoDeAsentamiento;

    use App\Entity\TipoDeAsentamiento;
    use App\Service\TipoDeAsentamiento\TipoDeAsentamientoDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TipoDeAsentamientoDeleteService $service;

        public function __construct(TipoDeAsentamientoDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeAsentamiento{
            return $this->service->delete($id);
        }
    }