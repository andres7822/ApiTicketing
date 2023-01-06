<?php

    namespace App\Api\Action\Persona;

    use App\Entity\Persona;
    use App\Service\Persona\PersonaUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private PersonaUpdateService $service;

        public function __construct(PersonaUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Persona{
            $NombreORazonSocial = RequestService::getField($request, 'NombreORazonSocial');
            $Telefono = RequestService::getField($request, 'Telefono');
            $CorreoElectronico = RequestService::getField($request, 'CorreoElectronico');
            $TipoDePersona = RequestService::getField($request, 'TipoDePersona');
            $DatosFiscales = RequestService::getField($request, 'DatosFiscales', false);

            return $this->service->update($id, $NombreORazonSocial, $Telefono, $CorreoElectronico, $TipoDePersona, $DatosFiscales);
        }
    }