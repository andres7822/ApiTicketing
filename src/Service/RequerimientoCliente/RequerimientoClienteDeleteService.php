<?php

    namespace App\Service\RequerimientoCliente;

    use App\Entity\RequerimientoCliente;
    use App\Repository\RequerimientoClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class RequerimientoClienteDeleteService{
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
        public function delete(int $id): RequerimientoCliente{
            $RequerimientoCliente = $this->repository->findById($id);
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

            $this->repository->removeEntity($RequerimientoCliente);

            $this->accesoService->create('RequerimientoCliente', $id, 3, $data);

            return $RequerimientoCliente;
        }
    }