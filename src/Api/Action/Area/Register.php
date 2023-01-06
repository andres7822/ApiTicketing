<?php

    namespace App\Api\Action\Area;

    use App\Entity\Area;
    use App\Service\Area\AreaRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private AreaRegisterService $service;

        public function __construct(AreaRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Area{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->create($Nombre);
        }
    }