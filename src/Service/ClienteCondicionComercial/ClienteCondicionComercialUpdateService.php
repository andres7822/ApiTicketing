<?php

    namespace App\Service\ClienteCondicionComercial;

    use App\Entity\ClienteCondicionComercial;
    use App\Repository\ClienteCondicionComercialRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClienteCondicionComercialUpdateService{
        private ClienteCondicionComercialRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(ClienteCondicionComercialRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function update(int $id, int $Cliente, int $CatalogoCondicionesComerciales, string $Descripcion, ?\DateTime $FechaAceptaci_on, int $Status, int $UsuarioRegistro, \DateTime $FechaTupla): ClienteCondicionComercial{
            $ClienteCondicionComercial = $this->repository->findById($id);
            $ClienteCondicionComercial->setCliente($Cliente);
            $ClienteCondicionComercial->setCatalogoCondicionesComerciales($CatalogoCondicionesComerciales);
            $ClienteCondicionComercial->setDescripcion($Descripcion);
            $ClienteCondicionComercial->setFechaAceptaci_on($FechaAceptaci_on);
            $ClienteCondicionComercial->setStatus($Status);
            $ClienteCondicionComercial->setUsuarioRegistro($UsuarioRegistro);
            $ClienteCondicionComercial->setFechaTupla($FechaTupla);
            $this->repository->save($ClienteCondicionComercial);

            $data = [
                'Cliente' => $ClienteCondicionComercial->getCliente(),
                'CatalogoCondicionesComerciales' => $ClienteCondicionComercial->getCatalogoCondicionesComerciales(),
                'Descripcion' => $ClienteCondicionComercial->getDescripcion(),
                'FechaAceptaci_on' => $ClienteCondicionComercial->getFechaAceptaci_on(),
                'Status' => $ClienteCondicionComercial->getStatus(),
                'UsuarioRegistro' => $ClienteCondicionComercial->getUsuarioRegistro(),
                'FechaTupla' => $ClienteCondicionComercial->getFechaTupla()
            ];
            $this->accesoService->create('ClienteCondicionComercial', $id, 5, $data);

            return $ClienteCondicionComercial;
        }
    }