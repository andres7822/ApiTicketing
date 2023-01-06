<?php

    namespace App\Service\DocumentoCliente;

    use App\Entity\DocumentoCliente;
    use App\Repository\DocumentoClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DocumentoClienteRegisterService{
        private DocumentoClienteRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(DocumentoClienteRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(int $Cliente, int $Documento, ?int $Archivo, ?string $Comentarios): DocumentoCliente{
            $DocumentoCliente = new DocumentoCliente($Cliente, $Documento, $Archivo, $Comentarios);

            $this->repository->save($DocumentoCliente);

            $data = [
                'Cliente' => $DocumentoCliente->getCliente(),
                'Documento' => $DocumentoCliente->getDocumento(),
                'Archivo' => $DocumentoCliente->getArchivo(),
                'Comentarios' => $DocumentoCliente->getComentarios()
            ];
            $this->accesoService->create('DocumentoCliente', $DocumentoCliente->getId(), 2, $data);

            return $DocumentoCliente;
        }
    }