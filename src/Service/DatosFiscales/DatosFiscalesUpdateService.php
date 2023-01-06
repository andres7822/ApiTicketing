<?php

    namespace App\Service\DatosFiscales;

    use App\Entity\DatosFiscales;
    use App\Repository\DatosFiscalesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DatosFiscalesUpdateService{
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
        public function update(int $id, string $NombreORazonSocial, string $RFC, int $RegimenFiscal, int $Domicilio, \DateTime $FechaTupla, string $Origen, string $Tupla): DatosFiscales{
            $DatosFiscales = $this->repository->findById($id);
            $DatosFiscales->setNombreORazonSocial($NombreORazonSocial);
            $DatosFiscales->setRFC($RFC);
            $DatosFiscales->setRegimenFiscal($RegimenFiscal);
            $DatosFiscales->setDomicilio($Domicilio);
            $DatosFiscales->setFechaTupla($FechaTupla);
            $DatosFiscales->setOrigen($Origen);
            $DatosFiscales->setTupla($Tupla);
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
            $this->accesoService->create('DatosFiscales', $id, 5, $data);

            return $DatosFiscales;
        }
    }