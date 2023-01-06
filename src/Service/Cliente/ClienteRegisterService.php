<?php

    namespace App\Service\Cliente;

    use App\Entity\Cliente;
    use App\Repository\ClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClienteRegisterService{
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
        public function create(string $Nombre, string $NoCliente, int $Empresa, mixed $FechaTupla, int $UsuarioRegistro, int $Status, ?int $PaginaWeb, ?float $LimiteDeCredito): Cliente{
            if(!($FechaTupla instanceof \DateTime)){
                $FechaTupla = new \DateTime($FechaTupla);
            }
            $Cliente = new Cliente($Nombre, $NoCliente, $Empresa, $FechaTupla, $UsuarioRegistro, $Status, $PaginaWeb, $LimiteDeCredito);
            $this->repository->save($Cliente);

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
            $this->accesoService->create('Cliente', $Cliente->getId(), 2, $data);

            return $Cliente;
        }
    }