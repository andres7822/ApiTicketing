<?php

    namespace App\Service\RequerimientoCliente;

    use App\Entity\RequerimientoCliente;
    use App\Repository\RequerimientoClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class RequerimientoClienteRegisterService{
        private RequerimientoClienteRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(RequerimientoClienteRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(int $Cliente, \DateTime $Fecha, ?int $Status, string $Valor, int $Solicitante, ?int $Requerimiento, int $UsuarioRegistro, int $EmpleadoElaboro): RequerimientoCliente{
            $RequerimientoCliente = new RequerimientoCliente($Cliente, $Fecha, $Status, $Valor, $Solicitante, $Requerimiento, $UsuarioRegistro, $EmpleadoElaboro);

            $this->repository->save($RequerimientoCliente);

            $data = [
                'Cliente' => $RequerimientoCliente->getCliente(),
                'Fecha' => $RequerimientoCliente->getFecha(),
                'Status' => $RequerimientoCliente->getStatus(),
                'Valor' => $RequerimientoCliente->getValor(),
                'Solicitante' => $RequerimientoCliente->getSolicitante(),
                'Requerimiento' => $RequerimientoCliente->getRequerimiento(),
                'UsuarioRegistro' => $RequerimientoCliente->getUsuarioRegistro(),
                'EmpleadoElaboro' => $RequerimientoCliente->getEmpleadoElaboro()
            ];
            $this->accesoService->create('RequerimientoCliente', $RequerimientoCliente->getId(), 2, $data);

            return $RequerimientoCliente;
        }
    }