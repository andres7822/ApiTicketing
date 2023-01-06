<?php

    namespace App\Service\TipoDePersona;

    use App\Entity\TipoDePersona;
    use App\Repository\TipoDePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDePersonaRegisterService{
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
        public function create(string $Descripcion): TipoDePersona{
            $TipoDePersona = new TipoDePersona($Descripcion);

            $this->repository->save($TipoDePersona);

            $data = [
                'Descripcion' => $TipoDePersona->getDescripcion()
            ];
            $this->accesoService->create('TipoDePersona', $TipoDePersona->getId(), 2, $data);

            return $TipoDePersona;
        }
    }