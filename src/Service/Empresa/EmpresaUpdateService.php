<?php

    namespace App\Service\Empresa;

    use App\Entity\Empresa;
    use App\Repository\EmpresaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class EmpresaUpdateService{
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
        public function update(int $id, int $NombreComercial, ?int $DatosFiscales): Empresa{
            $Empresa = $this->repository->findById($id);
            $Empresa->setNombreComercial($NombreComercial);
            $Empresa->setDatosFiscales($DatosFiscales);
            $this->repository->save($Empresa);

            $data = [
                'NombreComercial' => $Empresa->getNombreComercial(),
                'DatosFiscales' => $Empresa->getDatosFiscales()
            ];
            $this->accesoService->create('Empresa', $id, 5, $data);

            return $Empresa;
        }
    }