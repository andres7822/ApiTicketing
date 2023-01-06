<?php

    namespace App\Service\Empresa;

    use App\Entity\Empresa;
    use App\Repository\EmpresaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class EmpresaDeleteService{
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
        public function delete(int $id): Empresa{
            $Empresa = $this->repository->findById($id);
            $data = [
                'NombreComercial' => $Empresa->getNombreComercial(),
                'DatosFiscales' => $Empresa->getDatosFiscales()
            ];

            $this->repository->removeEntity($Empresa);

            $this->accesoService->create('Empresa', $id, 3, $data);

            return $Empresa;
        }
    }