<?php

    namespace App\Api\Action\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Service\StatusCondicionComercial\StatusCondicionComercialRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private StatusCondicionComercialRegisterService $service;

        public function __construct(StatusCondicionComercialRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): StatusCondicionComercial{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);

            return $this->service->create($Nombre, $Descripcion);
        }
    }