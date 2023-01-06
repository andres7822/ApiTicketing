<?php

    namespace App\Api\Action\DatosFiscales;

    use App\Entity\DatosFiscales;
    use App\Service\DatosFiscales\DatosFiscalesRegisterService;
    use App\Service\Request\RequestService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;
    use Symfony\Component\HttpFoundation\Request;

    class Register{
        private DatosFiscalesRegisterService $service;

        public function __construct(DatosFiscalesRegisterService $service){
            $this->service = $service;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function __invoke(Request $request): DatosFiscales{
            $NombreORazonSocial = RequestService::getField($request, 'NombreORazonSocial');
            $RFC = RequestService::getField($request, 'RFC');
            $RegimenFiscal = RequestService::getField($request, 'RegimenFiscal');
            $Domicilio = RequestService::getField($request, 'Domicilio');
            $FechaTupla = RequestService::getField($request, 'FechaTupla');
            $Origen = RequestService::getField($request, 'Origen');
            $Tupla = RequestService::getField($request, 'Tupla');

            return $this->service->create($NombreORazonSocial, $RFC, $RegimenFiscal, $Domicilio, $FechaTupla, $Origen, $Tupla);
        }
    }