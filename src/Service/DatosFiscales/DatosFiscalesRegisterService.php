<?php

    namespace App\Service\DatosFiscales;

    use App\Entity\DatosFiscales;
    use App\Repository\DatosFiscalesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DatosFiscalesRegisterService{
        private DatosFiscalesRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(DatosFiscalesRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(string $NombreORazonSocial, string $RFC, int $RegimenFiscal, int $Domicilio, \DateTime $FechaTupla, string $Origen, string $Tupla): DatosFiscales{
            $DatosFiscales = new DatosFiscales($NombreORazonSocial, $RFC, $RegimenFiscal, $Domicilio, $FechaTupla, $Origen, $Tupla);

            $this->repository->save($DatosFiscales);

            $data = [
                'NombreORazonSocial' => $DatosFiscales->getNombreORazonSocial(),
                'RFC' => $DatosFiscales->getRFC(),
                'RegimenFiscal' => $DatosFiscales->getRegimenFiscal(),
                'Domicilio' => $DatosFiscales->getDomicilio(),
                'FechaTupla' => $DatosFiscales->getFechaTupla(),
                'Origen' => $DatosFiscales->getOrigen(),
                'Tupla' => $DatosFiscales->getTupla()
            ];
            $this->accesoService->create('DatosFiscales', $DatosFiscales->getId(), 2, $data);

            return $DatosFiscales;
        }
    }