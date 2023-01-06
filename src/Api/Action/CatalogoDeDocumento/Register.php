<?php

    namespace App\Api\Action\CatalogoDeDocumento;

    use App\Entity\CatalogoDeDocumento;
    use App\Service\CatalogoDeDocumento\CatalogoDeDocumentoRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private CatalogoDeDocumentoRegisterService $service;

        public function __construct(CatalogoDeDocumentoRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): CatalogoDeDocumento{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);
            $Activo = RequestService::getField($request, 'Activo');
            $Prioridad = RequestService::getField($request, 'Prioridad');
            $Origen = RequestService::getField($request, 'Origen');
            $Requerido = RequestService::getField($request, 'Requerido', false);

            return $this->service->create($Nombre, $Descripcion, $Activo, $Prioridad, $Origen, $Requerido);
        }
    }