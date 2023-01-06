<?php

    namespace App\Service\ClienteCondicionComercial;

    use App\Entity\ClienteCondicionComercial;
    use App\Repository\ClienteCondicionComercialRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClienteCondicionComercialRegisterService{
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
        public function create(int $Cliente, int $CatalogoCondicionesComerciales, string $Descripcion, ?\DateTime $FechaAceptaci_on, int $Status, int $UsuarioRegistro, \DateTime $FechaTupla): ClienteCondicionComercial{
            $ClienteCondicionComercial = new ClienteCondicionComercial($Cliente, $CatalogoCondicionesComerciales, $Descripcion, $FechaAceptaci_on, $Status, $UsuarioRegistro, $FechaTupla);

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
            $this->accesoService->create('ClienteCondicionComercial', $ClienteCondicionComercial->getId(), 2, $data);

            return $ClienteCondicionComercial;
        }
    }