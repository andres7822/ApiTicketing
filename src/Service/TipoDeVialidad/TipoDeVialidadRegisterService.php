<?php

    namespace App\Service\TipoDeVialidad;

    use App\Entity\TipoDeVialidad;
    use App\Repository\TipoDeVialidadRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeVialidadRegisterService{
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
        public function create(string $Nombre): TipoDeVialidad{
            $TipoDeVialidad = new TipoDeVialidad($Nombre);

            $this->repository->save($TipoDeVialidad);

            $data = [
                'Nombre' => $TipoDeVialidad->getNombre()
            ];
            $this->accesoService->create('TipoDeVialidad', $TipoDeVialidad->getId(), 2, $data);

            return $TipoDeVialidad;
        }
    }