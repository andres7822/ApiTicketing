<?php

    namespace App\Service\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Repository\TipoDeClientePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeClientePersonaDataService{
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
        public function data(int $id): TipoDeClientePersona{
            $TipoDeClientePersona = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeClientePersona->getNombre(),
                'Descripcion' => $TipoDeClientePersona->getDescripcion()
            ];

            $this->accesoService->create('TipoDeClientePersona', $id, 4, $data);

            return $TipoDeClientePersona;
        }
    }