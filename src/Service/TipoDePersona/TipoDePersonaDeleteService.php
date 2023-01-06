<?php

    namespace App\Service\TipoDePersona;

    use App\Entity\TipoDePersona;
    use App\Repository\TipoDePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDePersonaDeleteService{
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
        public function delete(int $id): TipoDePersona{
            $TipoDePersona = $this->repository->findById($id);
            $data = [
                'Descripcion' => $TipoDePersona->getDescripcion()
            ];

            $this->repository->removeEntity($TipoDePersona);

            $this->accesoService->create('TipoDePersona', $id, 3, $data);

            return $TipoDePersona;
        }
    }