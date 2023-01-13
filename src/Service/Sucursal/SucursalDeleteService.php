<?php

    namespace App\Service\Sucursal;

    use App\Entity\Sucursal;
    use App\Repository\SucursalRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class SucursalDeleteService{
        private SucursalRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(SucursalRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): Sucursal{
            $Sucursal = $this->repository->findById($id);
            $data = [
                'Nombre' => $Sucursal->getNombre()
            ];

            $this->repository->removeEntity($Sucursal);

            $this->accesoService->create('Sucursal', $id, 3, $data);

            return $Sucursal;
        }
    }