<?php

    namespace App\Api\Action\DocumentoCliente;

    use App\Entity\DocumentoCliente;
    use App\Service\DocumentoCliente\DocumentoClienteUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private DocumentoClienteUpdateService $service;

        public function __construct(DocumentoClienteUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): DocumentoCliente{
            $Cliente = RequestService::getField($request, 'Cliente');
            $Documento = RequestService::getField($request, 'Documento');
            $Archivo = RequestService::getField($request, 'Archivo', false);
            $Comentarios = RequestService::getField($request, 'Comentarios', false);

            return $this->service->update($id, $Cliente, $Documento, $Archivo, $Comentarios);
        }
    }