<?php

    namespace App\Api\Action\Persona;

    use App\Entity\Persona;
    use App\Service\Persona\PersonaRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private PersonaRegisterService $service;

        public function __construct(PersonaRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Persona{
            $NombreORazonSocial = RequestService::getField($request, 'NombreORazonSocial');
            $Telefono = RequestService::getField($request, 'Telefono');
            $CorreoElectronico = RequestService::getField($request, 'CorreoElectronico');
            $TipoDePersona = RequestService::getField($request, 'TipoDePersona');
            $DatosFiscales = RequestService::getField($request, 'DatosFiscales', false);

            return $this->service->create($NombreORazonSocial, $Telefono, $CorreoElectronico, $TipoDePersona, $DatosFiscales);
        }
    }