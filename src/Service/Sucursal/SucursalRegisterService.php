<?php

    namespace App\Service\Sucursal;

    use App\Entity\Sucursal;
    use App\Repository\SucursalRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class SucursalRegisterService{
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
        public function create(string $Nombre): Sucursal{
            $Sucursal = new Sucursal($Nombre);

            $this->repository->save($Sucursal);

            $data = [
                'Nombre' => $Sucursal->getNombre()
            ];
            $this->accesoService->create('Sucursal', $Sucursal->getId(), 2, $data);

            return $Sucursal;
        }
    }