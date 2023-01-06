<?php

    namespace App\Api\Action\DocumentoCliente;

    use App\Entity\DocumentoCliente;
    use App\Service\DocumentoCliente\DocumentoClienteDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private DocumentoClienteDataService $service;

        public function __construct(DocumentoClienteDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): DocumentoCliente{
            return $this->service->data($id);
        }
    }