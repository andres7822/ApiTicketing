<?php

    namespace App\Repository;

    use App\Entity\ClienteCondicionComercial;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class ClienteCondicionComercialRepository extends BaseRepository{

        protected static function entityClass(): string{
            return ClienteCondicionComercial::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(ClienteCondicionComercial $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): ClienteCondicionComercial{
            if(null == $ClienteCondicionComercial = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de ClienteCondicionComercial con id $id");
            }

            return $ClienteCondicionComercial;
        }
    }