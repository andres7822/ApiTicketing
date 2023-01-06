<?php

    namespace App\Service\RequerimientoCliente;

    use App\Entity\RequerimientoCliente;
    use App\Repository\RequerimientoClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class RequerimientoClienteUpdateService{
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
        public function update(int $id, int $Cliente, \DateTime $Fecha, ?int $Status, string $Valor, int $Solicitante, ?int $Requerimiento, int $UsuarioRegistro, int $EmpleadoElaboro): RequerimientoCliente{
            $RequerimientoCliente = $this->repository->findById($id);
            $RequerimientoCliente->setCliente($Cliente);
            $RequerimientoCliente->setFecha($Fecha);
            $RequerimientoCliente->setStatus($Status);
            $RequerimientoCliente->setValor($Valor);
            $RequerimientoCliente->setSolicitante($Solicitante);
            $RequerimientoCliente->setRequerimiento($Requerimiento);
            $RequerimientoCliente->setUsuarioRegistro($UsuarioRegistro);
            $RequerimientoCliente->setEmpleadoElaboro($EmpleadoElaboro);
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
            $this->accesoService->create('RequerimientoCliente', $id, 5, $data);

            return $RequerimientoCliente;
        }
    }