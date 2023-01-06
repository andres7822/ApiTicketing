<?php

namespace App\Repository;

use App\Entity\Sucursal;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class SucursalRepository extends BaseRepository{

    protected static function entityClass(): string{
        return Sucursal::class;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(Sucursal $entity): void{
        $this->saveEntity($entity);
    }

    public function findById(int $id): Sucursal{
        if(null == $Sucursal = $this->objectRepository->find($id)){
            throw new ConflictHttpException("No existe el registro de Sucursal con id $id");
        }

        return $Sucursal;
    }
}