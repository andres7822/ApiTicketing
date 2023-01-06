<?php

    namespace App\Api\Action\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Service\TipoDeServicio\TipoDeServicioDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TipoDeServicioDeleteService $service;

        public function __construct(TipoDeServicioDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeServicio{
            return $this->service->delete($id);
        }
    }