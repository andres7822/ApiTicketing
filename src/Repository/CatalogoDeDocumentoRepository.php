<?php

    namespace App\Repository;

    use App\Entity\CatalogoDeDocumento;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class CatalogoDeDocumentoRepository extends BaseRepository{

        protected static function entityClass(): string{
            return CatalogoDeDocumento::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(CatalogoDeDocumento $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): CatalogoDeDocumento{
            if(null == $CatalogoDeDocumento = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de CatalogoDeDocumento con id $id");
            }

            return $CatalogoDeDocumento;
        }
    }