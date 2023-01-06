<?php

    namespace App\Repository;

    use App\Entity\DocumentoCliente;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

    class DocumentoClienteRepository extends BaseRepository{

        protected static function entityClass(): string{
            return DocumentoCliente::class;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function save(DocumentoCliente $entity): void{
            $this->saveEntity($entity);
        }

        public function findById(int $id): DocumentoCliente{
            if(null == $DocumentoCliente = $this->objectRepository->find($id)){
                throw new ConflictHttpException("No existe el registro de DocumentoCliente con id $id");
            }

            return $DocumentoCliente;
        }
    }