<?php

    namespace App\Api\Action\Configuraci_nNotificaci_on;

    use App\Entity\Configuraci_nNotificaci_on;
    use App\Service\Configuraci_nNotificaci_on\Configuraci_nNotificaci_onUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private Configuraci_nNotificaci_onUpdateService $service;

        public function __construct(Configuraci_nNotificaci_onUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Configuraci_nNotificaci_on{
            $Usuario = RequestService::getField($request, 'Usuario', false);
            $TipoDeNotificaci_on = RequestService::getField($request, 'TipoDeNotificaci_on');

            return $this->service->update($id, $Usuario, $TipoDeNotificaci_on);
        }
    }