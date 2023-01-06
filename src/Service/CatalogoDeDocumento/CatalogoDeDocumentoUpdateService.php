<?php

    namespace App\Service\CatalogoDeDocumento;

    use App\Entity\CatalogoDeDocumento;
    use App\Repository\CatalogoDeDocumentoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoDeDocumentoUpdateService{
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
        public function update(int $id, string $Nombre, ?string $Descripcion, int $Activo, int $Prioridad, string $Origen, ?int $Requerido): CatalogoDeDocumento{
            $CatalogoDeDocumento = $this->repository->findById($id);
            $CatalogoDeDocumento->setNombre($Nombre);
            $CatalogoDeDocumento->setDescripcion($Descripcion);
            $CatalogoDeDocumento->setActivo($Activo);
            $CatalogoDeDocumento->setPrioridad($Prioridad);
            $CatalogoDeDocumento->setOrigen($Origen);
            $CatalogoDeDocumento->setRequerido($Requerido);
            $this->repository->save($CatalogoDeDocumento);

            $data = [
                'Nombre' => $CatalogoDeDocumento->getNombre(),
                'Descripcion' => $CatalogoDeDocumento->getDescripcion(),
                'Activo' => $CatalogoDeDocumento->getActivo(),
                'Prioridad' => $CatalogoDeDocumento->getPrioridad(),
                'Origen' => $CatalogoDeDocumento->getOrigen(),
                'Requerido' => $CatalogoDeDocumento->getRequerido()
            ];
            $this->accesoService->create('CatalogoDeDocumento', $id, 5, $data);

            return $CatalogoDeDocumento;
        }
    }