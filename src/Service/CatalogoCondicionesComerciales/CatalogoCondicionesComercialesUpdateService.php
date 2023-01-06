<?php

    namespace App\Service\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Repository\CatalogoCondicionesComercialesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoCondicionesComercialesUpdateService{
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
        public function update(int $id, string $Nombre, string $DescripcionCondicion, int $Requerida): CatalogoCondicionesComerciales{
            $CatalogoCondicionesComerciales = $this->repository->findById($id);
            $CatalogoCondicionesComerciales->setNombre($Nombre);
            $CatalogoCondicionesComerciales->setDescripcionCondicion($DescripcionCondicion);
            $CatalogoCondicionesComerciales->setRequerida($Requerida);
            $this->repository->save($CatalogoCondicionesComerciales);

            $data = [
                'Nombre' => $CatalogoCondicionesComerciales->getNombre(),
                'DescripcionCondicion' => $CatalogoCondicionesComerciales->getDescripcionCondicion(),
                'Requerida' => $CatalogoCondicionesComerciales->getRequerida()
            ];
            $this->accesoService->create('CatalogoCondicionesComerciales', $id, 5, $data);

            return $CatalogoCondicionesComerciales;
        }
    }