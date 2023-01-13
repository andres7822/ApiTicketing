<?php

    namespace App\Api\Action\TipoDeNotificaci_on;

    use App\Entity\TipoDeNotificaci_on;
    use App\Service\TipoDeNotificaci_on\TipoDeNotificaci_onRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private TipoDeNotificaci_onRegisterService $service;

        public function __construct(TipoDeNotificaci_onRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): TipoDeNotificaci_on{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->create($Nombre);
        }
    }