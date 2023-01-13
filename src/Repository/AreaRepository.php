<?php

    namespace App\Repository;

    use App\Entity\Area;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class AreaRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Area::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Area $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Area{
            if(null == $Area = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Area con id $id");
            }

            return $Area;
        }
    }