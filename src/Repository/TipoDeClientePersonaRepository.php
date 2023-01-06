<?php

    namespace App\Repository;

    use App\Entity\TipoDeClientePersona;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class TipoDeClientePersonaRepository extends BaseRepository{

        protected static function entityClass(): string{
            return TipoDeClientePersona::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(TipoDeClientePersona $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): TipoDeClientePersona{
            if(null == $TipoDeClientePersona = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de TipoDeClientePersona con id $id");
            }

            return $TipoDeClientePersona;
        }
    }