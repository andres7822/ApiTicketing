<?php

    namespace App\Repository;

    use App\Entity\SeguimientoTicket;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class SeguimientoTicketRepository extends BaseRepository{

        protected static function entityClass(): string{
            return SeguimientoTicket::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(SeguimientoTicket $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): SeguimientoTicket{
            if(null == $SeguimientoTicket = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de SeguimientoTicket con id $id");
            }

            return $SeguimientoTicket;
        }
    }