<?php

    namespace App\Service\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Repository\TipoDeClientePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeClientePersonaUpdateService{
        private TipoDeClientePersonaRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDeClientePersonaRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function update(int $id, string $Nombre, ?string $Descripcion): TipoDeClientePersona{
            $TipoDeClientePersona = $this->repository->findById($id);
            $TipoDeClientePersona->setNombre($Nombre);
            $TipoDeClientePersona->setDescripcion($Descripcion);
            $this->repository->save($TipoDeClientePersona);

            $data = [
                'Nombre' => $TipoDeClientePersona->getNombre(),
                'Descripcion' => $TipoDeClientePersona->getDescripcion()
            ];
            $this->accesoService->create('TipoDeClientePersona', $id, 5, $data);

            return $TipoDeClientePersona;
        }
    }