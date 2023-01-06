<?php

    namespace App\Api\Action\CatalogoDeDocumento;

    use App\Entity\CatalogoDeDocumento;
    use App\Service\CatalogoDeDocumento\CatalogoDeDocumentoDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private CatalogoDeDocumentoDataService $service;

        public function __construct(CatalogoDeDocumentoDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): CatalogoDeDocumento{
            return $this->service->data($id);
        }
    }