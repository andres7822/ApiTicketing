<?php

    namespace App\Service\Cliente;

    use App\Entity\Cliente;
    use App\Repository\ClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClienteUpdateService{
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
        public function update(int $id, string $Nombre, string $NoCliente, int $Empresa, \DateTime $FechaTupla, int $UsuarioRegistro, int $Status, ?int $PaginaWeb, ?float $LimiteDeCredito): Cliente{
            $Cliente = $this->repository->findById($id);
            $Cliente->setNombre($Nombre);
            $Cliente->setNoCliente($NoCliente);
            $Cliente->setEmpresa($Empresa);
            $Cliente->setFechaTupla($FechaTupla);
            $Cliente->setUsuarioRegistro($UsuarioRegistro);
            $Cliente->setStatus($Status);
            $Cliente->setPaginaWeb($PaginaWeb);
            $Cliente->setLimiteDeCredito($LimiteDeCredito);
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
            $this->accesoService->create('Cliente', $id, 5, $data);

            return $Cliente;
        }
    }