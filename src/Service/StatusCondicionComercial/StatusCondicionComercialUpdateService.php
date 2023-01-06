<?php

    namespace App\Service\StatusCondicionComercial;

    use App\Entity\StatusCondicionComercial;
    use App\Repository\StatusCondicionComercialRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class StatusCondicionComercialUpdateService{
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
        public function update(int $id, string $Nombre, ?string $Descripcion): StatusCondicionComercial{
            $StatusCondicionComercial = $this->repository->findById($id);
            $StatusCondicionComercial->setNombre($Nombre);
            $StatusCondicionComercial->setDescripcion($Descripcion);
            $this->repository->save($StatusCondicionComercial);

            $data = [
                'Nombre' => $StatusCondicionComercial->getNombre(),
                'Descripcion' => $StatusCondicionComercial->getDescripcion()
            ];
            $this->accesoService->create('StatusCondicionComercial', $id, 5, $data);

            return $StatusCondicionComercial;
        }
    }