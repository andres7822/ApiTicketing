<?php

    namespace App\Service\CatalogoDeRequerimientos;

    use App\Entity\CatalogoDeRequerimientos;
    use App\Repository\CatalogoDeRequerimientosRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoDeRequerimientosDataService{
        private CatalogoDeRequerimientosRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(CatalogoDeRequerimientosRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function data(int $id): CatalogoDeRequerimientos{
            $CatalogoDeRequerimientos = $this->repository->findById($id);
            $data = [
                'TipoDeServicio' => $CatalogoDeRequerimientos->getTipoDeServicio(),
                'Requerimiento' => $CatalogoDeRequerimientos->getRequerimiento(),
                'Orden' => $CatalogoDeRequerimientos->getOrden(),
                'Requerido' => $CatalogoDeRequerimientos->getRequerido(),
                'Catalogo' => $CatalogoDeRequerimientos->getCatalogo()
            ];

            $this->accesoService->create('CatalogoDeRequerimientos', $id, 4, $data);

            return $CatalogoDeRequerimientos;
        }
    }