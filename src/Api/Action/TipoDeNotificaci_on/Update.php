<?php

    namespace App\Api\Action\TipoDeNotificaci_on;

    use App\Entity\TipoDeNotificaci_on;
    use App\Service\TipoDeNotificaci_on\TipoDeNotificaci_onUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private TipoDeNotificaci_onUpdateService $service;

        public function __construct(TipoDeNotificaci_onUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): TipoDeNotificaci_on{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->update($id, $Nombre);
        }
    }