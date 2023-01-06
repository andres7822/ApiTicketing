<?php

    namespace App\Service\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Repository\CatalogoCondicionesComercialesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoCondicionesComercialesDataService{
        private CatalogoCondicionesComercialesRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(CatalogoCondicionesComercialesRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function data(int $id): CatalogoCondicionesComerciales{
            $CatalogoCondicionesComerciales = $this->repository->findById($id);
            $data = [
                'Nombre' => $CatalogoCondicionesComerciales->getNombre(),
                'DescripcionCondicion' => $CatalogoCondicionesComerciales->getDescripcionCondicion(),
                'Requerida' => $CatalogoCondicionesComerciales->getRequerida()
            ];

            $this->accesoService->create('CatalogoCondicionesComerciales', $id, 4, $data);

            return $CatalogoCondicionesComerciales;
        }
    }