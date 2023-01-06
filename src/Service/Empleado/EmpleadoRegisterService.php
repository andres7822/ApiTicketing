<?php

    namespace App\Service\Empleado;

    use App\Entity\Empleado;
    use App\Repository\EmpleadoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class EmpleadoRegisterService{
        private EmpleadoRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(EmpleadoRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(string $Clave, int $Persona): Empleado{
            $Empleado = new Empleado($Clave, $Persona);

            $this->repository->save($Empleado);

            $data = [
                'Clave' => $Empleado->getClave(),
                'Persona' => $Empleado->getPersona()
            ];
            $this->accesoService->create('Empleado', $Empleado->getId(), 2, $data);

            return $Empleado;
        }
    }