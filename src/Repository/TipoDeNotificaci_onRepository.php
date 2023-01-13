<?php

    namespace App\Repository;

    use App\Entity\TipoDeNotificaci_on;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class TipoDeNotificaci_onRepository extends BaseRepository{

        protected static function entityClass(): string{
            return TipoDeNotificaci_on::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(TipoDeNotificaci_on $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): TipoDeNotificaci_on{
            if(null == $TipoDeNotificaci_on = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de TipoDeNotificaci_on con id $id");
            }

            return $TipoDeNotificaci_on;
        }
    }