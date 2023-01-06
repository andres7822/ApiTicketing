<?php

    namespace App\Repository;

    use App\Entity\TipoDeAsentamiento;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class TipoDeAsentamientoRepository extends BaseRepository{

        protected static function entityClass(): string{
            return TipoDeAsentamiento::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(TipoDeAsentamiento $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): TipoDeAsentamiento{
            if(null == $TipoDeAsentamiento = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de TipoDeAsentamiento con id $id");
            }

            return $TipoDeAsentamiento;
        }
    }