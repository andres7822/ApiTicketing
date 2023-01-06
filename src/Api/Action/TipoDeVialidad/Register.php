<?php

    namespace App\Api\Action\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Service\TipoDeVialidad\TipoDeVialidadRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private TipoDeVialidadRegisterService $service;

        public function __construct(TipoDeVialidadRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): TipoDeVialidad{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->create($Nombre);
        }
    }