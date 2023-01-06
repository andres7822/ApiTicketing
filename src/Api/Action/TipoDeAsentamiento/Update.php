<?php

    namespace App\Api\Action\TipoDeAsentamiento;

    use App\Entity\TipoDeAsentamiento;
    use App\Service\TipoDeAsentamiento\TipoDeAsentamientoUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TipoDeAsentamientoUpdateService $service;

        public function __construct(TipoDeAsentamientoUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): TipoDeAsentamiento{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->update($id, $Nombre);
        }
    }