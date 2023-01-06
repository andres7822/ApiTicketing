<?php

    namespace App\Repository;

    use App\Entity\Persona;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class PersonaRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Persona::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Persona $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Persona{
            if(null == $Persona = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Persona con id $id");
            }

            return $Persona;
        }
    }