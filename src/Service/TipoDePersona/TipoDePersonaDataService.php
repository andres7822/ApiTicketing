<?php

    namespace App\Service\TipoDePersona;

    use App\Entity\TipoDePersona;
    use App\Repository\TipoDePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDePersonaDataService{
        private TipoDePersonaRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDePersonaRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function data(int $id): TipoDePersona{
            $TipoDePersona = $this->repository->findById($id);
            $data = [
                'Descripcion' => $TipoDePersona->getDescripcion()
            ];

            $this->accesoService->create('TipoDePersona', $id, 4, $data);

            return $TipoDePersona;
        }
    }