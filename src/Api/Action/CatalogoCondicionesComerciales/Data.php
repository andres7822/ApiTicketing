<?php

    namespace App\Api\Action\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Service\CatalogoCondicionesComerciales\CatalogoCondicionesComercialesDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private CatalogoCondicionesComercialesDataService $service;

        public function __construct(CatalogoCondicionesComercialesDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): CatalogoCondicionesComerciales{
            return $this->service->data($id);
        }
    }