<?php

    namespace App\Repository;

    use App\Entity\MedioDeSeguimiento;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class MedioDeSeguimientoRepository extends BaseRepository{

        protected static function entityClass(): string{
            return MedioDeSeguimiento::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(MedioDeSeguimiento $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): MedioDeSeguimiento{
            if(null == $MedioDeSeguimiento = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de MedioDeSeguimiento con id $id");
            }

            return $MedioDeSeguimiento;
        }
    }