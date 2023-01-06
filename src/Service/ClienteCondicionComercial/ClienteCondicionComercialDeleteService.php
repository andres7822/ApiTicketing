<?php

    namespace App\Service\ClienteCondicionComercial;

    use App\Entity\ClienteCondicionComercial;
    use App\Repository\ClienteCondicionComercialRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClienteCondicionComercialDeleteService{
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
        public function delete(int $id): ClienteCondicionComercial{
            $ClienteCondicionComercial = $this->repository->findById($id);
            $data = [
                'Cliente' => $ClienteCondicionComercial->getCliente(),
                'CatalogoCondicionesComerciales' => $ClienteCondicionComercial->getCatalogoCondicionesComerciales(),
                'Descripcion' => $ClienteCondicionComercial->getDescripcion(),
                'FechaAceptaci_on' => $ClienteCondicionComercial->getFechaAceptaci_on(),
                'Status' => $ClienteCondicionComercial->getStatus(),
                'UsuarioRegistro' => $ClienteCondicionComercial->getUsuarioRegistro(),
                'FechaTupla' => $ClienteCondicionComercial->getFechaTupla()
            ];

            $this->repository->removeEntity($ClienteCondicionComercial);

            $this->accesoService->create('ClienteCondicionComercial', $id, 3, $data);

            return $ClienteCondicionComercial;
        }
    }