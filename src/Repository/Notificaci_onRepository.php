<?php

    namespace App\Repository;

    use App\Entity\Notificaci_on;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class Notificaci_onRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Notificaci_on::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Notificaci_on $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Notificaci_on{
            if(null == $Notificaci_on = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Notificaci_on con id $id");
            }

            return $Notificaci_on;
        }
    }