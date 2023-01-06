<?php

    namespace App\Repository;

    use App\Entity\Seguimiento;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class SeguimientoRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Seguimiento::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Seguimiento $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Seguimiento{
            if(null == $Seguimiento = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Seguimiento con id $id");
            }

            return $Seguimiento;
        }
    }