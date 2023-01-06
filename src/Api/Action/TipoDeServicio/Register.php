<?php

    namespace App\Api\Action\TipoDeServicio;

    use App\Entity\TipoDeServicio;
    use App\Service\TipoDeServicio\TipoDeServicioRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private TipoDeServicioRegisterService $service;

        public function __construct(TipoDeServicioRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): TipoDeServicio{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);
            $Activo = RequestService::getField($request, 'Activo');

            return $this->service->create($Nombre, $Descripcion, $Activo);
        }
    }