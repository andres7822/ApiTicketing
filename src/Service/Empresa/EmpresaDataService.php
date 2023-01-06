<?php

    namespace App\Service\Empresa;

    use App\Entity\Empresa;
    use App\Repository\EmpresaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class EmpresaDataService{
        private EmpresaRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(EmpresaRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function data(int $id): Empresa{
            $Empresa = $this->repository->findById($id);
            $data = [
                'NombreComercial' => $Empresa->getNombreComercial(),
                'DatosFiscales' => $Empresa->getDatosFiscales()
            ];

            $this->accesoService->create('Empresa', $id, 4, $data);

            return $Empresa;
        }
    }