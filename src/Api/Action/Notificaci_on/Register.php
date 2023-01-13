<?php

    namespace App\Api\Action\Notificaci_on;

    use App\Entity\Notificaci_on;
    use App\Service\Notificaci_on\Notificaci_onRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private Notificaci_onRegisterService $service;

        public function __construct(Notificaci_onRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Notificaci_on{
            $Usuario = RequestService::getField($request, 'Usuario');
            $Notificado = RequestService::getField($request, 'Notificado', false);
            $Mensaje = RequestService::getField($request, 'Mensaje');

            return $this->service->create($Usuario, $Notificado, $Mensaje);
        }
    }