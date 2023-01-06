<?php

    namespace App\Service\DatosFiscales;

    use App\Entity\DatosFiscales;
    use App\Repository\DatosFiscalesRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class DatosFiscalesDeleteService{
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
        public function delete(int $id): DatosFiscales{
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

            $this->repository->removeEntity($DatosFiscales);

            $this->accesoService->create('DatosFiscales', $id, 3, $data);

            return $DatosFiscales;
        }
    }