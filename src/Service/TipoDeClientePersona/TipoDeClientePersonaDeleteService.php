<?php

    namespace App\Service\TipoDeClientePersona;

    use App\Entity\TipoDeClientePersona;
    use App\Repository\TipoDeClientePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeClientePersonaDeleteService{
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
        public function delete(int $id): TipoDeClientePersona{
            $TipoDeClientePersona = $this->repository->findById($id);
            $data = [
                'Nombre' => $TipoDeClientePersona->getNombre(),
                'Descripcion' => $TipoDeClientePersona->getDescripcion()
            ];

            $this->repository->removeEntity($TipoDeClientePersona);

            $this->accesoService->create('TipoDeClientePersona', $id, 3, $data);

            return $TipoDeClientePersona;
        }
    }