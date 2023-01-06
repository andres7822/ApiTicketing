<?php

    namespace App\Service\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Repository\StatusCondicionComercialRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class StatusCondicionComercialDeleteService{
        private StatusCondicionComercialRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(StatusCondicionComercialRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): StatusCondicionComercial{
            $StatusCondicionComercial = $this->repository->findById($id);
            $data = [
                'Nombre' => $StatusCondicionComercial->getNombre(),
                'Descripcion' => $StatusCondicionComercial->getDescripcion()
            ];

            $this->repository->removeEntity($StatusCondicionComercial);

            $this->accesoService->create('StatusCondicionComercial', $id, 3, $data);

            return $StatusCondicionComercial;
        }
    }