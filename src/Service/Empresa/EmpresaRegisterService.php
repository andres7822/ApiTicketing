<?php

    namespace App\Service\Empresa;

    use App\Entity\Empresa;
    use App\Repository\EmpresaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class EmpresaRegisterService{
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
        public function create(int $NombreComercial, ?int $DatosFiscales): Empresa{
            $Empresa = new Empresa($NombreComercial, $DatosFiscales);

            $this->repository->save($Empresa);

            $data = [
                'NombreComercial' => $Empresa->getNombreComercial(),
                'DatosFiscales' => $Empresa->getDatosFiscales()
            ];
            $this->accesoService->create('Empresa', $Empresa->getId(), 2, $data);

            return $Empresa;
        }
    }