<?php

namespace App\Service\Area;

use App\Entity\Area;
use App\Repository\AreaRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class AreaDataService{
    private AreaRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(AreaRepository $repository,
                                systemLogRegisterService $accesoService){
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function data(int $id): Area{
        $Area = $this->repository->findById($id);
        $data = [
            'Nombre' => $Area->getNombre(),
        ];

        $this->accesoService->create('Area', $id, 4, $data);

        return $Area;
    }
}