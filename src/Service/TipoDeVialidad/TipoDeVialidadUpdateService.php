<?php

    namespace App\Service\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Repository\TipoDeVialidadRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeVialidadUpdateService{
        private TipoDeVialidadRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDeVialidadRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function update(int $id, string $Nombre): TipoDeVialidad{
            $TipoDeVialidad = $this->repository->findById($id);
            $TipoDeVialidad->setNombre($Nombre);
            $this->repository->save($TipoDeVialidad);

            $data = [
                'Nombre' => $TipoDeVialidad->getNombre()
            ];
            $this->accesoService->create('TipoDeVialidad', $id, 5, $data);

            return $TipoDeVialidad;
        }
    }