<?php

    namespace App\Api\Action\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Service\CatalogoCondicionesComerciales\CatalogoCondicionesComercialesDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private CatalogoCondicionesComercialesDeleteService $service;

        public function __construct(CatalogoCondicionesComercialesDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): CatalogoCondicionesComerciales{
            return $this->service->delete($id);
        }
    }