<?php

    namespace App\Service\CatalogoDeDocumento;

    use App\Entity\CatalogoDeDocumento;
    use App\Repository\CatalogoDeDocumentoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoDeDocumentoDeleteService{
        private CatalogoDeDocumentoRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(CatalogoDeDocumentoRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): CatalogoDeDocumento{
            $CatalogoDeDocumento = $this->repository->findById($id);
            $data = [
                'Nombre' => $CatalogoDeDocumento->getNombre(),
                'Descripcion' => $CatalogoDeDocumento->getDescripcion(),
                'Activo' => $CatalogoDeDocumento->getActivo(),
                'Prioridad' => $CatalogoDeDocumento->getPrioridad(),
                'Origen' => $CatalogoDeDocumento->getOrigen(),
                'Requerido' => $CatalogoDeDocumento->getRequerido()
            ];

            $this->repository->removeEntity($CatalogoDeDocumento);

            $this->accesoService->create('CatalogoDeDocumento', $id, 3, $data);

            return $CatalogoDeDocumento;
        }
    }