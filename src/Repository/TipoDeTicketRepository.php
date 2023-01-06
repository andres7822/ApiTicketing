<?php

namespace App\Repository;

use App\Entity\TipoDeTicket;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class TipoDeTicketRepository extends BaseRepository{

    protected static function entityClass(): string{
        return TipoDeTicket::class;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(TipoDeTicket $entity): void{
        $this->saveEntity($entity);
    }

    public function findById(int $id): TipoDeTicket{
        if(null == $TipoDeTicket = $this->objectRepository->find($id)){
            throw new ConflictHttpException("No existe el registro de TipoDeTicket con id $id");
        }

        return $TipoDeTicket;
    }
}