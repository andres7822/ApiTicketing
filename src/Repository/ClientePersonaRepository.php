<?php

    namespace App\Repository;

    use App\Entity\ClientePersona;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class ClientePersonaRepository extends BaseRepository{

        protected static function entityClass(): string{
            return ClientePersona::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(ClientePersona $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): ClientePersona{
            if(null == $ClientePersona = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de ClientePersona con id $id");
            }

            return $ClientePersona;
        }
    }