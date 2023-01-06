<?php

    namespace App\Service\CatalogoDeDocumento;

    use App\Entity\CatalogoDeDocumento;
    use App\Repository\CatalogoDeDocumentoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class CatalogoDeDocumentoRegisterService{
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
        public function create(string $Nombre, ?string $Descripcion, int $Activo, int $Prioridad, string $Origen, ?int $Requerido): CatalogoDeDocumento{
            $CatalogoDeDocumento = new CatalogoDeDocumento($Nombre, $Descripcion, $Activo, $Prioridad, $Origen, $Requerido);

            $this->repository->save($CatalogoDeDocumento);

            $data = [
                'Nombre' => $CatalogoDeDocumento->getNombre(),
                'Descripcion' => $CatalogoDeDocumento->getDescripcion(),
                'Activo' => $CatalogoDeDocumento->getActivo(),
                'Prioridad' => $CatalogoDeDocumento->getPrioridad(),
                'Origen' => $CatalogoDeDocumento->getOrigen(),
                'Requerido' => $CatalogoDeDocumento->getRequerido()
            ];
            $this->accesoService->create('CatalogoDeDocumento', $CatalogoDeDocumento->getId(), 2, $data);

            return $CatalogoDeDocumento;
        }
    }