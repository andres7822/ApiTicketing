<?php

    namespace App\Api\Action\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Service\CatalogoCondicionesComerciales\CatalogoCondicionesComercialesRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private CatalogoCondicionesComercialesRegisterService $service;

        public function __construct(CatalogoCondicionesComercialesRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): CatalogoCondicionesComerciales{
            $Nombre = RequestService::getField($request, 'Nombre');
            $DescripcionCondicion = RequestService::getField($request, 'DescripcionCondicion');
            $Requerida = RequestService::getField($request, 'Requerida');

            return $this->service->create($Nombre, $DescripcionCondicion, $Requerida);
        }
    }