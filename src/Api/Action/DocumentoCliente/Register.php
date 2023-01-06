<?php

    namespace App\Api\Action\DocumentoCliente;

    use App\Entity\DocumentoCliente;
    use App\Service\DocumentoCliente\DocumentoClienteRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private DocumentoClienteRegisterService $service;

        public function __construct(DocumentoClienteRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): DocumentoCliente{
            $Cliente = RequestService::getField($request, 'Cliente');
            $Documento = RequestService::getField($request, 'Documento');
            $Archivo = RequestService::getField($request, 'Archivo', false);
            $Comentarios = RequestService::getField($request, 'Comentarios', false);

            return $this->service->create($Cliente, $Documento, $Archivo, $Comentarios);
        }
    }