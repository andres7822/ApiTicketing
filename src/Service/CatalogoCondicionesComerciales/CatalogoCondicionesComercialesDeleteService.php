<?php

    namespace App\Service\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Repository\CatalogoCondicionesComercialesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoCondicionesComercialesDeleteService{
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
        public function delete(int $id): CatalogoCondicionesComerciales{
            $CatalogoCondicionesComerciales = $this->repository->findById($id);
            $data = [
                'Nombre' => $CatalogoCondicionesComerciales->getNombre(),
                'DescripcionCondicion' => $CatalogoCondicionesComerciales->getDescripcionCondicion(),
                'Requerida' => $CatalogoCondicionesComerciales->getRequerida()
            ];

            $this->repository->removeEntity($CatalogoCondicionesComerciales);

            $this->accesoService->create('CatalogoCondicionesComerciales', $id, 3, $data);

            return $CatalogoCondicionesComerciales;
        }
    }