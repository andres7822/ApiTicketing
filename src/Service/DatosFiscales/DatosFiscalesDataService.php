<?php

    namespace App\Service\DatosFiscales;

    use App\Entity\DatosFiscales;
    use App\Repository\DatosFiscalesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DatosFiscalesDataService{
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
        public function data(int $id): DatosFiscales{
            $DatosFiscales = $this->repository->findById($id);
            $data = [
                'NombreORazonSocial' => $DatosFiscales->getNombreORazonSocial(),
                'RFC' => $DatosFiscales->getRFC(),
                'RegimenFiscal' => $DatosFiscales->getRegimenFiscal(),
                'Domicilio' => $DatosFiscales->getDomicilio(),
                'FechaTupla' => $DatosFiscales->getFechaTupla(),
                'Origen' => $DatosFiscales->getOrigen(),
                'Tupla' => $DatosFiscales->getTupla()
            ];

            $this->accesoService->create('DatosFiscales', $id, 4, $data);

            return $DatosFiscales;
        }
    }