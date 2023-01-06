<?php

    namespace App\Api\Action\ClientePersona;

    use App\Entity\ClientePersona;
    use App\Service\ClientePersona\ClientePersonaUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private ClientePersonaUpdateService $service;

        public function __construct(ClientePersonaUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): ClientePersona{
            $Cliente = RequestService::getField($request, 'Cliente');
            $Persona = RequestService::getField($request, 'Persona');
            $Relacion = RequestService::getField($request, 'Relacion');
            $Titulo = RequestService::getField($request, 'Titulo', false);
            $Telefono = RequestService::getField($request, 'Telefono', false);
            $Telefono2 = RequestService::getField($request, 'Telefono2', false);
            $CorreoElectronico = RequestService::getField($request, 'CorreoElectronico', false);

            return $this->service->update($id, $Cliente, $Persona, $Relacion, $Titulo, $Telefono, $Telefono2, $CorreoElectronico);
        }
    }