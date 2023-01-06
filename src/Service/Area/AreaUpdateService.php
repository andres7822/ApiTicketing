<?php

namespace App\Service\Area;

use App\Entity\Area;
use App\Repository\AreaRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class AreaUpdateService{
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
    public function update(int $id, string $Nombre): Area{
        $Area = $this->repository->findById($id);
        $Area->setNombre($Nombre);
        $this->repository->save($Area);

        $data = [
            'Nombre' => $Area->getNombre()
        ];
        $this->accesoService->create('Area', $id, 5, $data);

        return $Area;
    }
}