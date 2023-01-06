<?php

    namespace App\Api\Action\Cliente;

    use App\Entity\Cliente;
    use App\Service\Cliente\ClienteUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private ClienteUpdateService $service;

        public function __construct(ClienteUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Cliente{
            $Nombre = RequestService::getField($request, 'Nombre');
            $NoCliente = RequestService::getField($request, 'NoCliente');
            $Empresa = RequestService::getField($request, 'Empresa');
            $FechaTupla = RequestService::getField($request, 'FechaTupla');
            $UsuarioRegistro = RequestService::getField($request, 'UsuarioRegistro');
            $Status = RequestService::getField($request, 'Status');
            $PaginaWeb = RequestService::getField($request, 'PaginaWeb', false);
            $LimiteDeCredito = RequestService::getField($request, 'LimiteDeCredito', false);

            return $this->service->update($id, $Nombre, $NoCliente, $Empresa, $FechaTupla, $UsuarioRegistro, $Status, $PaginaWeb, $LimiteDeCredito);
        }
    }