<?php

namespace App\Service\StatusProspectacion;

use App\Entity\StatusProspectacion;
use App\Repository\StatusProspectacionRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class StatusProspectacionDataService
{
    private StatusProspectacionRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(StatusProspectacionRepository $repository,
                                systemLogRegisterService      $accesoService)
    {
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function data(int $id): StatusProspectacion
    {
        $StatusProspectacion = $this->repository->findById($id);
        $data = [
            'Descipcion' => $StatusProspectacion->getDescipcion(),
            'Acotacion' => $StatusProspectacion->getAcotacion(),
            'Origen' => $StatusProspectacion->getOrigen(),
            'Nombre' => $StatusProspectacion->getNombre(),
            'Descripcion' => $StatusProspectacion->getDescripcion()
        ];

        $this->accesoService->create('StatusProspectacion', $id, 4, $data);

        return $StatusProspectacion;
    }
}