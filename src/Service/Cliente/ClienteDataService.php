<?php

    namespace App\Service\Cliente;

    use App\Entity\Cliente;
    use App\Repository\ClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClienteDataService{
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
        public function data(int $id): Cliente{
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

            $this->accesoService->create('Cliente', $id, 4, $data);

            return $Cliente;
        }
    }