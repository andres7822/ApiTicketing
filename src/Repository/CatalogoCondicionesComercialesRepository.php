<?php

    namespace App\Repository;

    use App\Entity\CatalogoCondicionesComerciales;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class CatalogoCondicionesComercialesRepository extends BaseRepository{

        protected static function entityClass(): string{
            return CatalogoCondicionesComerciales::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(CatalogoCondicionesComerciales $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): CatalogoCondicionesComerciales{
            if(null == $CatalogoCondicionesComerciales = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de CatalogoCondicionesComerciales con id $id");
            }

            return $CatalogoCondicionesComerciales;
        }
    }