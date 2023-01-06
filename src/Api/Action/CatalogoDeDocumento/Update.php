<?php

    namespace App\Api\Action\CatalogoDeDocumento;

    use App\Entity\CatalogoDeDocumento;
    use App\Service\CatalogoDeDocumento\CatalogoDeDocumentoUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private CatalogoDeDocumentoUpdateService $service;

        public function __construct(CatalogoDeDocumentoUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): CatalogoDeDocumento{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);
            $Activo = RequestService::getField($request, 'Activo');
            $Prioridad = RequestService::getField($request, 'Prioridad');
            $Origen = RequestService::getField($request, 'Origen');
            $Requerido = RequestService::getField($request, 'Requerido', false);

            return $this->service->update($id, $Nombre, $Descripcion, $Activo, $Prioridad, $Origen, $Requerido);
        }
    }