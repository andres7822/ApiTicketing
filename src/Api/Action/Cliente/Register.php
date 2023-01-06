<?php

    namespace App\Api\Action\Cliente;

    use App\Entity\Cliente;
    use App\Service\Cliente\ClienteRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private ClienteRegisterService $service;

        public function __construct(ClienteRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Cliente{
            $Nombre = RequestService::getField($request, 'Nombre');
            $NoCliente = RequestService::getField($request, 'NoCliente');
            $Empresa = RequestService::getField($request, 'Empresa');
            $FechaTupla = RequestService::getField($request, 'FechaTupla');
            $UsuarioRegistro = RequestService::getField($request, 'UsuarioRegistro');
            $Status = RequestService::getField($request, 'Status');
            $PaginaWeb = RequestService::getField($request, 'PaginaWeb', false);
            $LimiteDeCredito = RequestService::getField($request, 'LimiteDeCredito', false);

            return $this->service->create($Nombre, $NoCliente, $Empresa, $FechaTupla, $UsuarioRegistro, $Status, $PaginaWeb, $LimiteDeCredito);
        }
    }