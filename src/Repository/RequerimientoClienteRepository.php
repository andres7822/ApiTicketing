<?php

    namespace App\Repository;

    use App\Entity\RequerimientoCliente;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class RequerimientoClienteRepository extends BaseRepository{

        protected static function entityClass(): string{
            return RequerimientoCliente::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(RequerimientoCliente $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): RequerimientoCliente{
            if(null == $RequerimientoCliente = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de RequerimientoCliente con id $id");
            }

            return $RequerimientoCliente;
        }
    }