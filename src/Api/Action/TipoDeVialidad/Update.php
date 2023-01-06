<?php

    namespace App\Api\Action\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Service\TipoDeVialidad\TipoDeVialidadUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TipoDeVialidadUpdateService $service;

        public function __construct(TipoDeVialidadUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): TipoDeVialidad{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->update($id, $Nombre);
        }
    }