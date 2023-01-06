<?php

    namespace App\Api\Action\TipoDePersona;

    use App\Entity\TipoDePersona;
    use App\Service\TipoDePersona\TipoDePersonaRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private TipoDePersonaRegisterService $service;

        public function __construct(TipoDePersonaRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): TipoDePersona{
            $Descripcion = RequestService::getField($request, 'Descripcion');

            return $this->service->create($Descripcion);
        }
    }