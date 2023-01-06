<?php

    namespace App\Service\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Repository\TipoDeClientePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeClientePersonaRegisterService{
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
        public function create(string $Nombre, ?string $Descripcion): TipoDeClientePersona{
            $TipoDeClientePersona = new TipoDeClientePersona($Nombre, $Descripcion);

            $this->repository->save($TipoDeClientePersona);

            $data = [
                'Nombre' => $TipoDeClientePersona->getNombre(),
                'Descripcion' => $TipoDeClientePersona->getDescripcion()
            ];
            $this->accesoService->create('TipoDeClientePersona', $TipoDeClientePersona->getId(), 2, $data);

            return $TipoDeClientePersona;
        }
    }