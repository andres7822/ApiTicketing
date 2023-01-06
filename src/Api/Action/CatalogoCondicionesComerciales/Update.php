<?php

    namespace App\Api\Action\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Service\CatalogoCondicionesComerciales\CatalogoCondicionesComercialesUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private CatalogoCondicionesComercialesUpdateService $service;

        public function __construct(CatalogoCondicionesComercialesUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): CatalogoCondicionesComerciales{
            $Nombre = RequestService::getField($request, 'Nombre');
            $DescripcionCondicion = RequestService::getField($request, 'DescripcionCondicion');
            $Requerida = RequestService::getField($request, 'Requerida');

            return $this->service->update($id, $Nombre, $DescripcionCondicion, $Requerida);
        }
    }