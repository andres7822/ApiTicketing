<?php

    namespace App\Repository;

    use App\Entity\TipoDePersona;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class TipoDePersonaRepository extends BaseRepository{

        protected static function entityClass(): string{
            return TipoDePersona::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(TipoDePersona $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): TipoDePersona{
            if(null == $TipoDePersona = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de TipoDePersona con id $id");
            }

            return $TipoDePersona;
        }
    }