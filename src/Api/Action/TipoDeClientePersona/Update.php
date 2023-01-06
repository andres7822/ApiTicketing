<?php

    namespace App\Api\Action\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Service\TipoDeClientePersona\TipoDeClientePersonaUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TipoDeClientePersonaUpdateService $service;

        public function __construct(TipoDeClientePersonaUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): TipoDeClientePersona{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);

            return $this->service->update($id, $Nombre, $Descripcion);
        }
    }