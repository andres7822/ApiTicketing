<?php

    namespace App\Repository;

    use App\Entity\DatosFiscales;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class DatosFiscalesRepository extends BaseRepository{

        protected static function entityClass(): string{
            return DatosFiscales::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(DatosFiscales $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): DatosFiscales{
            if(null == $DatosFiscales = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de DatosFiscales con id $id");
            }

            return $DatosFiscales;
        }
    }