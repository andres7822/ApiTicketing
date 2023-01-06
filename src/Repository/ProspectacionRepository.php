<?php

    namespace App\Repository;

    use App\Entity\Prospectacion;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class ProspectacionRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Prospectacion::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Prospectacion $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Prospectacion{
            if(null == $Prospectacion = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Prospectacion con id $id");
            }

            return $Prospectacion;
        }
    }