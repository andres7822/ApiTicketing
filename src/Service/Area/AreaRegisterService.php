<?php

    namespace App\Service\Area;

    use App\Entity\Area;
    use App\Repository\AreaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class AreaRegisterService{
        private AreaRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(AreaRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(string $Nombre): Area{
            $Area = new Area($Nombre);

            $this->repository->save($Area);

            $data = [
                'Nombre' => $Area->getNombre()
            ];
            $this->accesoService->create('Area', $Area->getId(), 2, $data);

            return $Area;
        }
    }