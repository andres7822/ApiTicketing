<?php

    namespace App\Service\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Repository\StatusCondicionComercialRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class StatusCondicionComercialRegisterService{
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
        public function create(string $Nombre, ?string $Descripcion): StatusCondicionComercial{
            $StatusCondicionComercial = new StatusCondicionComercial($Nombre, $Descripcion);

            $this->repository->save($StatusCondicionComercial);

            $data = [
                'Nombre' => $StatusCondicionComercial->getNombre(),
                'Descripcion' => $StatusCondicionComercial->getDescripcion()
            ];
            $this->accesoService->create('StatusCondicionComercial', $StatusCondicionComercial->getId(), 2, $data);

            return $StatusCondicionComercial;
        }
    }