<?php

    namespace App\Api\Action\CatalogoDeDocumento;

    use App\Entity\CatalogoDeDocumento;
    use App\Service\CatalogoDeDocumento\CatalogoDeDocumentoDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private CatalogoDeDocumentoDeleteService $service;

        public function __construct(CatalogoDeDocumentoDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): CatalogoDeDocumento{
            return $this->service->delete($id);
        }
    }