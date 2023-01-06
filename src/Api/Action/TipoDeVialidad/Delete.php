<?php

    namespace App\Api\Action\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Service\TipoDeVialidad\TipoDeVialidadDeleteService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Delete{
        private TipoDeVialidadDeleteService $service;

        public function __construct(TipoDeVialidadDeleteService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id): TipoDeVialidad{
            return $this->service->delete($id);
        }
    }