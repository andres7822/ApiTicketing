<?php

    namespace App\Service\DocumentoCliente;

    use App\Entity\DocumentoCliente;
    use App\Repository\DocumentoClienteRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DocumentoClienteDataService{
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
        public function data(int $id): DocumentoCliente{
            $DocumentoCliente = $this->repository->findById($id);
            $data = [
                'Cliente' => $DocumentoCliente->getCliente(),
                'Documento' => $DocumentoCliente->getDocumento(),
                'Archivo' => $DocumentoCliente->getArchivo(),
                'Comentarios' => $DocumentoCliente->getComentarios()
            ];

            $this->accesoService->create('DocumentoCliente', $id, 4, $data);

            return $DocumentoCliente;
        }
    }