<?php

    namespace App\Repository;

    use App\Entity\Domicilio;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class DomicilioRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Domicilio::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Domicilio $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Domicilio{
            if(null == $Domicilio = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Domicilio con id $id");
            }

            return $Domicilio;
        }
    }