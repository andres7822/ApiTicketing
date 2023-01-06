<?php

namespace App\Repository;

use App\Entity\ParticipacionTicket;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class ParticipacionTicketRepository extends BaseRepository{

    protected static function entityClass(): string{
        return ParticipacionTicket::class;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(ParticipacionTicket $entity): void{
        $this->saveEntity($entity);
    }

    public function findById(int $id): ParticipacionTicket{
        if(null == $ParticipacionTicket = $this->objectRepository->find($id)){
            throw new ConflictHttpException("No existe el registro de ParticipacionTicket con id $id");
        }

        return $ParticipacionTicket;
    }
}