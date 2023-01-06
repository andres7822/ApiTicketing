<?php

    namespace App\Api\Action\TipoDePersona;

    use App\Entity\TipoDePersona;
    use App\Service\TipoDePersona\TipoDePersonaUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TipoDePersonaUpdateService $service;

        public function __construct(TipoDePersonaUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): TipoDePersona{
            $Descripcion = RequestService::getField($request, 'Descripcion');

            return $this->service->update($id, $Descripcion);
        }
    }