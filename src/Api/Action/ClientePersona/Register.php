<?php

    namespace App\Api\Action\ClientePersona;

    use App\Entity\ClientePersona;
    use App\Service\ClientePersona\ClientePersonaRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private ClientePersonaRegisterService $service;

        public function __construct(ClientePersonaRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): ClientePersona{
            $Cliente = RequestService::getField($request, 'Cliente');
            $Persona = RequestService::getField($request, 'Persona');
            $Relacion = RequestService::getField($request, 'Relacion');
            $Titulo = RequestService::getField($request, 'Titulo', false);
            $Telefono = RequestService::getField($request, 'Telefono', false);
            $Telefono2 = RequestService::getField($request, 'Telefono2', false);
            $CorreoElectronico = RequestService::getField($request, 'CorreoElectronico', false);

            return $this->service->create($Cliente, $Persona, $Relacion, $Titulo, $Telefono, $Telefono2, $CorreoElectronico);
        }
    }