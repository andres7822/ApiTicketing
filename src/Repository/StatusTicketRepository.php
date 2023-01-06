<?php

namespace App\Repository;

use App\Entity\StatusTicket;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class StatusTicketRepository extends BaseRepository{

    protected static function entityClass(): string{
        return StatusTicket::class;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(StatusTicket $entity): void{
        $this->saveEntity($entity);
    }

    public function findById(int $id): StatusTicket{
        if(null == $StatusTicket = $this->objectRepository->find($id)){
            throw new ConflictHttpException("No existe el registro de StatusTicket con id $id");
        }

        return $StatusTicket;
    }
}