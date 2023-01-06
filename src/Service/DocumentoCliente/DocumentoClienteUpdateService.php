<?php

    namespace App\Service\DocumentoCliente;

    use App\Entity\DocumentoCliente;
    use App\Repository\DocumentoClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DocumentoClienteUpdateService{
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
        public function update(int $id, int $Cliente, int $Documento, ?int $Archivo, ?string $Comentarios): DocumentoCliente{
            $DocumentoCliente = $this->repository->findById($id);
            $DocumentoCliente->setCliente($Cliente);
            $DocumentoCliente->setDocumento($Documento);
            $DocumentoCliente->setArchivo($Archivo);
            $DocumentoCliente->setComentarios($Comentarios);
            $this->repository->save($DocumentoCliente);

            $data = [
                'Cliente' => $DocumentoCliente->getCliente(),
                'Documento' => $DocumentoCliente->getDocumento(),
                'Archivo' => $DocumentoCliente->getArchivo(),
                'Comentarios' => $DocumentoCliente->getComentarios()
            ];
            $this->accesoService->create('DocumentoCliente', $id, 5, $data);

            return $DocumentoCliente;
        }
    }