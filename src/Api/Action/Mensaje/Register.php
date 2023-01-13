<?php

    namespace App\Api\Action\Mensaje;

    use App\Entity\Mensaje;
    use App\Service\Mensaje\MensajeRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private MensajeRegisterService $service;

        public function __construct(MensajeRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Mensaje{
            $Mensaje = RequestService::getField($request, 'Mensaje');

            return $this->service->create($Mensaje);
        }
    }