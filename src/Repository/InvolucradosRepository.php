<?php

    namespace App\Repository;

    use App\Entity\Involucrados;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class InvolucradosRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Involucrados::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Involucrados $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Involucrados{
            if(null == $Involucrados = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Involucrados con id $id");
            }

            return $Involucrados;
        }
    }