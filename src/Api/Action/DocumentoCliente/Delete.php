<?php

    namespace App\Api\Action\DocumentoCliente;

    use App\Entity\DocumentoCliente;
    use App\Service\DocumentoCliente\DocumentoClienteDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private DocumentoClienteDeleteService $service;

        public function __construct(DocumentoClienteDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): DocumentoCliente{
            return $this->service->delete($id);
        }
    }