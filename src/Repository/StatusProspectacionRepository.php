<?php

    namespace App\Repository;

    use App\Entity\StatusProspectacion;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class StatusProspectacionRepository extends BaseRepository{

        protected static function entityClass(): string{
            return StatusProspectacion::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(StatusProspectacion $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): StatusProspectacion{
            if(null == $StatusProspectacion = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de StatusProspectacion con id $id");
            }

            return $StatusProspectacion;
        }
    }