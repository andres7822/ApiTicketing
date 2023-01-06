<?php

    namespace App\Api\Action\TipoDeAsentamiento;

    use App\Entity\TipoDeAsentamiento;
    use App\Service\TipoDeAsentamiento\TipoDeAsentamientoRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private TipoDeAsentamientoRegisterService $service;

        public function __construct(TipoDeAsentamientoRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): TipoDeAsentamiento{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->create($Nombre);
        }
    }