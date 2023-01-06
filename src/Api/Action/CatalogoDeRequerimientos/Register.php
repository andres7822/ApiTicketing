<?php

    namespace App\Api\Action\CatalogoDeRequerimientos;

    use App\Entity\CatalogoDeRequerimientos;
    use App\Service\CatalogoDeRequerimientos\CatalogoDeRequerimientosRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private CatalogoDeRequerimientosRegisterService $service;

        public function __construct(CatalogoDeRequerimientosRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): CatalogoDeRequerimientos{
            $TipoDeServicio = RequestService::getField($request, 'TipoDeServicio');
            $Requerimiento = RequestService::getField($request, 'Requerimiento');
            $Orden = RequestService::getField($request, 'Orden');
            $Requerido = RequestService::getField($request, 'Requerido', false);
            $Catalogo = RequestService::getField($request, 'Catalogo', false);

            return $this->service->create($TipoDeServicio, $Requerimiento, $Orden, $Requerido, $Catalogo);
        }
    }