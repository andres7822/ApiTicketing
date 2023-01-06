<?php

    namespace App\Api\Action\CatalogoDeRequerimientos;

    use App\Entity\CatalogoDeRequerimientos;
    use App\Service\CatalogoDeRequerimientos\CatalogoDeRequerimientosDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private CatalogoDeRequerimientosDeleteService $service;

        public function __construct(CatalogoDeRequerimientosDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): CatalogoDeRequerimientos{
            return $this->service->delete($id);
        }
    }