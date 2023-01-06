<?php

    namespace App\Api\Action\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Service\TipoDeVialidad\TipoDeVialidadDataService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Data{
        private TipoDeVialidadDataService $service;

        public function __construct(TipoDeVialidadDataService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeVialidad{
            return $this->service->data($id);
        }
    }