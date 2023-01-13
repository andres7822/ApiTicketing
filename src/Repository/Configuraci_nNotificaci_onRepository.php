<?php

    namespace App\Repository;

    use App\Entity\Configuraci_nNotificaci_on;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class Configuraci_nNotificaci_onRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Configuraci_nNotificaci_on::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Configuraci_nNotificaci_on $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Configuraci_nNotificaci_on{
            if(null == $Configuraci_nNotificaci_on = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Configuraci_nNotificaci_on con id $id");
            }

            return $Configuraci_nNotificaci_on;
        }
    }