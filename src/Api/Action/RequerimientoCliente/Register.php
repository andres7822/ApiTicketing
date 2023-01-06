<?php

    namespace App\Api\Action\RequerimientoCliente;

    use App\Entity\RequerimientoCliente;
    use App\Service\RequerimientoCliente\RequerimientoClienteRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private RequerimientoClienteRegisterService $service;

        public function __construct(RequerimientoClienteRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): RequerimientoCliente{
            $Cliente = RequestService::getField($request, 'Cliente');
            $Fecha = RequestService::getField($request, 'Fecha');
            $Status = RequestService::getField($request, 'Status', false);
            $Valor = RequestService::getField($request, 'Valor');
            $Solicitante = RequestService::getField($request, 'Solicitante');
            $Requerimiento = RequestService::getField($request, 'Requerimiento', false);
            $UsuarioRegistro = RequestService::getField($request, 'UsuarioRegistro');
            $EmpleadoElaboro = RequestService::getField($request, 'EmpleadoElaboro');

            return $this->service->create($Cliente, $Fecha, $Status, $Valor, $Solicitante, $Requerimiento, $UsuarioRegistro, $EmpleadoElaboro);
        }
    }