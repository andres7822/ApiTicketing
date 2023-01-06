<?php

    namespace App\Api\Action\MedioDeSeguimiento;

    use App\Entity\MedioDeSeguimiento;
    use App\Service\MedioDeSeguimiento\MedioDeSeguimientoUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private MedioDeSeguimientoUpdateService $service;

        public function __construct(MedioDeSeguimientoUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): MedioDeSeguimiento{
            $Nombre = RequestService::getField($request, 'Nombre');
            $Descripcion = RequestService::getField($request, 'Descripcion', false);

            return $this->service->update($id, $Nombre, $Descripcion);
        }
    }