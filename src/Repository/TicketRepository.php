<?php

namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class TicketRepository extends BaseRepository{

    protected static function entityClass(): string{
        return Ticket::class;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(Ticket $entity): void{
        $this->saveEntity($entity);
    }

    public function findById(int $id): Ticket{
        if(null == $Ticket = $this->objectRepository->find($id)){
            throw new ConflictHttpException("No existe el registro de Ticket con id $id");
        }

        return $Ticket;
    }
}