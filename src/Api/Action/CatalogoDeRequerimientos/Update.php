<?php

    namespace App\Api\Action\CatalogoDeRequerimientos;

    use App\Entity\CatalogoDeRequerimientos;
    use App\Service\CatalogoDeRequerimientos\CatalogoDeRequerimientosUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private CatalogoDeRequerimientosUpdateService $service;

        public function __construct(CatalogoDeRequerimientosUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): CatalogoDeRequerimientos{
            $TipoDeServicio = RequestService::getField($request, 'TipoDeServicio');
            $Requerimiento = RequestService::getField($request, 'Requerimiento');
            $Orden = RequestService::getField($request, 'Orden');
            $Requerido = RequestService::getField($request, 'Requerido', false);
            $Catalogo = RequestService::getField($request, 'Catalogo', false);

            return $this->service->update($id, $TipoDeServicio, $Requerimiento, $Orden, $Requerido, $Catalogo);
        }
    }