<?php

    namespace App\Api\Action\Notificaci_on;

    use App\Entity\Notificaci_on;
    use App\Service\Notificaci_on\Notificaci_onUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private Notificaci_onUpdateService $service;

        public function __construct(Notificaci_onUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Notificaci_on{
            $Usuario = RequestService::getField($request, 'Usuario');
            $Notificado = RequestService::getField($request, 'Notificado', false);
            $Mensaje = RequestService::getField($request, 'Mensaje');

            return $this->service->update($id, $Usuario, $Notificado, $Mensaje);
        }
    }