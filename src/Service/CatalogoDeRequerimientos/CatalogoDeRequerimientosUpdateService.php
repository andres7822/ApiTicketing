<?php

    namespace App\Service\CatalogoDeRequerimientos;

    use App\Entity\CatalogoDeRequerimientos;
    use App\Repository\CatalogoDeRequerimientosRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoDeRequerimientosUpdateService{
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
        public function update(int $id, int $TipoDeServicio, string $Requerimiento, int $Orden, ?int $Requerido, ?string $Catalogo): CatalogoDeRequerimientos{
            $CatalogoDeRequerimientos = $this->repository->findById($id);
            $CatalogoDeRequerimientos->setTipoDeServicio($TipoDeServicio);
            $CatalogoDeRequerimientos->setRequerimiento($Requerimiento);
            $CatalogoDeRequerimientos->setOrden($Orden);
            $CatalogoDeRequerimientos->setRequerido($Requerido);
            $CatalogoDeRequerimientos->setCatalogo($Catalogo);
            $this->repository->save($CatalogoDeRequerimientos);

            $data = [
                'TipoDeServicio' => $CatalogoDeRequerimientos->getTipoDeServicio(),
                'Requerimiento' => $CatalogoDeRequerimientos->getRequerimiento(),
                'Orden' => $CatalogoDeRequerimientos->getOrden(),
                'Requerido' => $CatalogoDeRequerimientos->getRequerido(),
                'Catalogo' => $CatalogoDeRequerimientos->getCatalogo()
            ];
            $this->accesoService->create('CatalogoDeRequerimientos', $id, 5, $data);

            return $CatalogoDeRequerimientos;
        }
    }