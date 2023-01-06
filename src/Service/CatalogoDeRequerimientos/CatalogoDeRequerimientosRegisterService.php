<?php

    namespace App\Service\CatalogoDeRequerimientos;

    use App\Entity\CatalogoDeRequerimientos;
    use App\Repository\CatalogoDeRequerimientosRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoDeRequerimientosRegisterService{
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
        public function create(int $TipoDeServicio, string $Requerimiento, int $Orden, ?int $Requerido, ?string $Catalogo): CatalogoDeRequerimientos{
            $CatalogoDeRequerimientos = new CatalogoDeRequerimientos($TipoDeServicio, $Requerimiento, $Orden, $Requerido, $Catalogo);

            $this->repository->save($CatalogoDeRequerimientos);

            $data = [
                'TipoDeServicio' => $CatalogoDeRequerimientos->getTipoDeServicio(),
                'Requerimiento' => $CatalogoDeRequerimientos->getRequerimiento(),
                'Orden' => $CatalogoDeRequerimientos->getOrden(),
                'Requerido' => $CatalogoDeRequerimientos->getRequerido(),
                'Catalogo' => $CatalogoDeRequerimientos->getCatalogo()
            ];
            $this->accesoService->create('CatalogoDeRequerimientos', $CatalogoDeRequerimientos->getId(), 2, $data);

            return $CatalogoDeRequerimientos;
        }
    }