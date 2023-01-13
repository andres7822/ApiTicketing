<?php

    namespace App\Api\Action\Mensaje;

    use App\Entity\Mensaje;
    use App\Service\Mensaje\MensajeUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private MensajeUpdateService $service;

        public function __construct(MensajeUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Mensaje{
            $Mensaje = RequestService::getField($request, 'Mensaje');

            return $this->service->update($id, $Mensaje);
        }
    }