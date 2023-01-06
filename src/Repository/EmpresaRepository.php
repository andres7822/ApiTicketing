<?php

    namespace App\Repository;

    use App\Entity\Empresa;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class EmpresaRepository extends BaseRepository{

        protected static function entityClass(): string{
            return Empresa::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(Empresa $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): Empresa{
            if(null == $Empresa = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de Empresa con id $id");
            }

            return $Empresa;
        }
    }