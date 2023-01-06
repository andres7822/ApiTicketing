<?php

    namespace App\Api\Action\Empresa;

    use App\Entity\Empresa;
    use App\Service\Empresa\EmpresaUpdateService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Update{
        private EmpresaUpdateService $service;

        public function __construct(EmpresaUpdateService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(int $id, Request $request): Empresa{
            $NombreComercial = RequestService::getField($request, 'NombreComercial');
            $DatosFiscales = RequestService::getField($request, 'DatosFiscales', false);

            return $this->service->update($id, $NombreComercial, $DatosFiscales);
        }
    }