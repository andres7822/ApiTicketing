<?php

    namespace App\Api\Action\RequerimientoCliente;

    use App\Entity\RequerimientoCliente;
    use App\Service\RequerimientoCliente\RequerimientoClienteUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private RequerimientoClienteUpdateService $service;

        public function __construct(RequerimientoClienteUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): RequerimientoCliente{
            $Cliente = RequestService::getField($request, 'Cliente');
            $Fecha = RequestService::getField($request, 'Fecha');
            $Status = RequestService::getField($request, 'Status', false);
            $Valor = RequestService::getField($request, 'Valor');
            $Solicitante = RequestService::getField($request, 'Solicitante');
            $Requerimiento = RequestService::getField($request, 'Requerimiento', false);
            $UsuarioRegistro = RequestService::getField($request, 'UsuarioRegistro');
            $EmpleadoElaboro = RequestService::getField($request, 'EmpleadoElaboro');

            return $this->service->update($id, $Cliente, $Fecha, $Status, $Valor, $Solicitante, $Requerimiento, $UsuarioRegistro, $EmpleadoElaboro);
        }
    }