<?php

    namespace App\Api\Action\ClienteCondicionComercial;

    use App\Entity\ClienteCondicionComercial;
    use App\Service\ClienteCondicionComercial\ClienteCondicionComercialUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private ClienteCondicionComercialUpdateService $service;

        public function __construct(ClienteCondicionComercialUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): ClienteCondicionComercial{
            $Cliente = RequestService::getField($request, 'Cliente');
            $CatalogoCondicionesComerciales = RequestService::getField($request, 'CatalogoCondicionesComerciales');
            $Descripcion = RequestService::getField($request, 'Descripcion');
            $FechaAceptaci_on = RequestService::getField($request, 'FechaAceptaci_on', false);
            $Status = RequestService::getField($request, 'Status');
            $UsuarioRegistro = RequestService::getField($request, 'UsuarioRegistro');
            $FechaTupla = RequestService::getField($request, 'FechaTupla');

            return $this->service->update($id, $Cliente, $CatalogoCondicionesComerciales, $Descripcion, $FechaAceptaci_on, $Status, $UsuarioRegistro, $FechaTupla);
        }
    }