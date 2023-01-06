<?php

    namespace App\Api\Action\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Service\StatusCondicionComercial\StatusCondicionComercialUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private StatusCondicionComercialUpdateService $service;

        public function __construct(StatusCondicionComercialUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): StatusCondicionComercial{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);

            return $this->service->update($id, $Nombre, $Descripcion);
        }
    }