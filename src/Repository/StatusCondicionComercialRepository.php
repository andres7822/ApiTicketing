<?php

    namespace App\Repository;

    use App\Entity\StatusCondicionComercial;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class StatusCondicionComercialRepository extends BaseRepository{

        protected static function entityClass(): string{
            return StatusCondicionComercial::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(StatusCondicionComercial $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): StatusCondicionComercial{
            if(null == $StatusCondicionComercial = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de StatusCondicionComercial con id $id");
            }

            return $StatusCondicionComercial;
        }
    }