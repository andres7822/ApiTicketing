<?php

    namespace App\Service\Cliente;

    use App\Entity\Cliente;
    use App\Repository\ClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClienteDeleteService{
        private ClienteRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(ClienteRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): Cliente{
            $Cliente = $this->repository->findById($id);
            $data = [
                'Nombre' => $Cliente->getNombre(),
                'NoCliente' => $Cliente->getNoCliente(),
                'Empresa' => $Cliente->getEmpresa(),
                'FechaTupla' => $Cliente->getFechaTupla(),
                'UsuarioRegistro' => $Cliente->getUsuarioRegistro(),
                'Status' => $Cliente->getStatus(),
                'PaginaWeb' => $Cliente->getPaginaWeb(),
                'LimiteDeCredito' => $Cliente->getLimiteDeCredito()
            ];

            $this->repository->removeEntity($Cliente);

            $this->accesoService->create('Cliente', $id, 3, $data);

            return $Cliente;
        }
    }