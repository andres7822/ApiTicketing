<?php

namespace App\Service\Sucursal;

use App\Entity\Sucursal;
use App\Repository\SucursalRepository;
use App\Service\systemLog\systemLogRegisterService;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;

class SucursalUpdateService{
    private SucursalRepository $repository;
    private systemLogRegisterService $accesoService;

    public function __construct(SucursalRepository $repository,
                                systemLogRegisterService $accesoService){
        $this->repository = $repository;
        $this->accesoService = $accesoService;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function update(int $id, string $Nombre): Sucursal{
        $Sucursal = $this->repository->findById($id);
        $Sucursal->setNombre($Nombre);
        $this->repository->save($Sucursal);

        $data = [
            'Nombre' => $Sucursal->getNombre()
        ];
        $this->accesoService->create('Sucursal', $id, 5, $data);

        return $Sucursal;
    }
}