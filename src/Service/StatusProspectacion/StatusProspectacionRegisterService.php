<?php

    namespace App\Service\StatusProspectacion;

    use App\Entity\StatusProspectacion;
    use App\Repository\StatusProspectacionRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class StatusProspectacionRegisterService{
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
        public function create(string $Descipcion, string $Acotacion, string $Origen, ?string $Nombre, ?string $Descripcion): StatusProspectacion{
            $StatusProspectacion = new StatusProspectacion($Descipcion, $Acotacion, $Origen, $Nombre, $Descripcion);

            $this->repository->save($StatusProspectacion);

            $data = [
                'Descipcion' => $StatusProspectacion->getDescipcion(),
                'Acotacion' => $StatusProspectacion->getAcotacion(),
                'Origen' => $StatusProspectacion->getOrigen(),
                'Nombre' => $StatusProspectacion->getNombre(),
                'Descripcion' => $StatusProspectacion->getDescripcion()
            ];
            $this->accesoService->create('StatusProspectacion', $StatusProspectacion->getId(), 2, $data);

            return $StatusProspectacion;
        }
    }