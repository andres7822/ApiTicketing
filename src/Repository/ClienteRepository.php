<?php

    namespace App\Repository;

    use App\Entity\Cliente;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class ClienteRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Cliente::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Cliente $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Cliente{
            if(null == $Cliente = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Cliente con id $id");
            }

            return $Cliente;
        }
    }