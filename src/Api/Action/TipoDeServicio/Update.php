<?php

    namespace App\Api\Action\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Service\TipoDeServicio\TipoDeServicioUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TipoDeServicioUpdateService $service;

        public function __construct(TipoDeServicioUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): TipoDeServicio{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion');
            $Activo = RequestService::getField($request, 'Activo');

            return $this->service->update($id, $Nombre, $Descripcion, $Activo);
        }
    }