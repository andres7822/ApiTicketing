<?php

    namespace App\Api\Action\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Service\TipoDeServicio\TipoDeServicioDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TipoDeServicioDataService $service;

        public function __construct(TipoDeServicioDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeServicio{
            return $this->service->data($id);
        }
    }