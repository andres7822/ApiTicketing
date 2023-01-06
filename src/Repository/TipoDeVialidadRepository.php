<?php

    namespace App\Repository;

    use App\Entity\TipoDeVialidad;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class TipoDeVialidadRepository extends BaseRepository{

        protected static function entityClass(): string{
            return TipoDeVialidad::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(TipoDeVialidad $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): TipoDeVialidad{
            if(null == $TipoDeVialidad = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de TipoDeVialidad con id $id");
            }

            return $TipoDeVialidad;
        }
    }