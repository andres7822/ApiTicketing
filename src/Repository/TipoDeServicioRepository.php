<?php

    namespace App\Repository;

    use App\Entity\TipoDeServicio;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class TipoDeServicioRepository extends BaseRepository{

        protected static function entityClass(): string{
            return TipoDeServicio::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(TipoDeServicio $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): TipoDeServicio{
            if(null == $TipoDeServicio = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de TipoDeServicio con id $id");
            }

            return $TipoDeServicio;
        }
    }