<?php

    namespace App\Api\Action\Configuraci_nNotificaci_on;

    use App\Entity\Configuraci_nNotificaci_on;
    use App\Service\Configuraci_nNotificaci_on\Configuraci_nNotificaci_onRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private Configuraci_nNotificaci_onRegisterService $service;

        public function __construct(Configuraci_nNotificaci_onRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Configuraci_nNotificaci_on{
            $Usuario = RequestService::getField($request, 'Usuario', false);
            $TipoDeNotificaci_on = RequestService::getField($request, 'TipoDeNotificaci_on');

            return $this->service->create($Usuario, $TipoDeNotificaci_on);
        }
    }