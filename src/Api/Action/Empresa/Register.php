<?php

    namespace App\Api\Action\Empresa;

    use App\Entity\Empresa;
    use App\Service\Empresa\EmpresaRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private EmpresaRegisterService $service;

        public function __construct(EmpresaRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): Empresa{
            $NombreComercial = RequestService::getField($request, 'NombreComercial');
            $DatosFiscales = RequestService::getField($request, 'DatosFiscales', false);

            return $this->service->create($NombreComercial, $DatosFiscales);
        }
    }