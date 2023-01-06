<?php

    namespace App\Repository;

    use App\Entity\Empleado;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class EmpleadoRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Empleado::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Empleado $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Empleado{
            if(null == $Empleado = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Empleado con id $id");
            }

            return $Empleado;
        }
    }