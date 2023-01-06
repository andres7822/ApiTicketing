<?php

    namespace App\Repository;

    use App\Entity\CatalogoDeRequerimientos;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class CatalogoDeRequerimientosRepository extends BaseRepository{

        protected static function entityClass(): string{
            return CatalogoDeRequerimientos::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(CatalogoDeRequerimientos $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): CatalogoDeRequerimientos{
            if(null == $CatalogoDeRequerimientos = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de CatalogoDeRequerimientos con id $id");
            }

            return $CatalogoDeRequerimientos;
        }
    }