<?php

    namespace App\Service\StatusProspectacion;

    use App\Entity\StatusProspectacion;
    use App\Repository\StatusProspectacionRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class StatusProspectacionUpdateService{
        private StatusProspectacionRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(StatusProspectacionRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function update(int $id, string $Descipcion, string $Acotacion, string $Origen, ?string $Nombre, ?string $Descripcion): StatusProspectacion{
            $StatusProspectacion = $this->repository->findById($id);
            $StatusProspectacion->setDescipcion($Descipcion);
            $StatusProspectacion->setAcotacion($Acotacion);
            $StatusProspectacion->setOrigen($Origen);
            $StatusProspectacion->setNombre($Nombre);
            $StatusProspectacion->setDescripcion($Descripcion);
            $this->repository->save($StatusProspectacion);

            $data = [
                'Descipcion' => $StatusProspectacion->getDescipcion(),
                'Acotacion' => $StatusProspectacion->getAcotacion(),
                'Origen' => $StatusProspectacion->getOrigen(),
                'Nombre' => $StatusProspectacion->getNombre(),
                'Descripcion' => $StatusProspectacion->getDescripcion()
            ];
            $this->accesoService->create('StatusProspectacion', $id, 5, $data);

            return $StatusProspectacion;
        }
    }