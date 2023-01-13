<?php

    namespace App\Repository;

    use App\Entity\Mensaje;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class MensajeRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Mensaje::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Mensaje $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Mensaje{
            if(null == $Mensaje = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Mensaje con id $id");
            }

            return $Mensaje;
        }
    }