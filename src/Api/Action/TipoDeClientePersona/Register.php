<?php

    namespace App\Api\Action\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Service\TipoDeClientePersona\TipoDeClientePersonaRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private TipoDeClientePersonaRegisterService $service;

        public function __construct(TipoDeClientePersonaRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): TipoDeClientePersona{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);

            return $this->service->create($Nombre, $Descripcion);
        }
    }