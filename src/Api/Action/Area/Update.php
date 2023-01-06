<?php

    namespace App\Api\Action\Area;

    use App\Entity\Area;
    use App\Service\Area\AreaUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private AreaUpdateService $service;

        public function __construct(AreaUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Area{
            $Nombre = RequestService::getField($request, 'Nombre');

            return $this->service->update($id, $Nombre);
        }
    }