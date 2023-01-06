<?php

    namespace App\Api\Action\StatusProspectacion;

    use App\Entity\StatusProspectacion;
    use App\Service\StatusProspectacion\StatusProspectacionRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private StatusProspectacionRegisterService $service;

        public function __construct(StatusProspectacionRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): StatusProspectacion{
            $Descipcion = RequestService::getField($request, 'Descipcion');
            $Acotacion = RequestService::getField($request, 'Acotacion');
            $Origen = RequestService::getField($request, 'Origen');
            $Nombre = RequestService::getField($request, 'Nombre', false);
            $Descripcion = RequestService::getField($request, 'Descripcion', false);

            return $this->service->create($Descipcion, $Acotacion, $Origen, $Nombre, $Descripcion);
        }
    }