<?php

    namespace App\Api\Action\CatalogoDeRequerimientos;

    use App\Entity\CatalogoDeRequerimientos;
    use App\Service\CatalogoDeRequerimientos\CatalogoDeRequerimientosDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private CatalogoDeRequerimientosDataService $service;

        public function __construct(CatalogoDeRequerimientosDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): CatalogoDeRequerimientos{
            return $this->service->data($id);
        }
    }