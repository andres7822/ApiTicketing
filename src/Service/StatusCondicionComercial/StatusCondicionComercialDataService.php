<?php

    namespace App\Service\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Repository\StatusCondicionComercialRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class StatusCondicionComercialDataService{
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
        public function data(int $id): StatusCondicionComercial{
            $StatusCondicionComercial = $this->repository->findById($id);
            $data = [
                'Nombre' => $StatusCondicionComercial->getNombre(),
                'Descripcion' => $StatusCondicionComercial->getDescripcion()
            ];

            $this->accesoService->create('StatusCondicionComercial', $id, 4, $data);

            return $StatusCondicionComercial;
        }
    }