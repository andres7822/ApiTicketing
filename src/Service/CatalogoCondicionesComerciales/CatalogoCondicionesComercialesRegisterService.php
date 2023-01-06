<?php

    namespace App\Service\CatalogoCondicionesComerciales;

    use App\Entity\CatalogoCondicionesComerciales;
    use App\Repository\CatalogoCondicionesComercialesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoCondicionesComercialesRegisterService{
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
        public function create(string $Nombre, string $DescripcionCondicion, int $Requerida): CatalogoCondicionesComerciales{
            $CatalogoCondicionesComerciales = new CatalogoCondicionesComerciales($Nombre, $DescripcionCondicion, $Requerida);

            $this->repository->save($CatalogoCondicionesComerciales);

            $data = [
                'Nombre' => $CatalogoCondicionesComerciales->getNombre(),
                'DescripcionCondicion' => $CatalogoCondicionesComerciales->getDescripcionCondicion(),
                'Requerida' => $CatalogoCondicionesComerciales->getRequerida()
            ];
            $this->accesoService->create('CatalogoCondicionesComerciales', $CatalogoCondicionesComerciales->getId(), 2, $data);

            return $CatalogoCondicionesComerciales;
        }
    }