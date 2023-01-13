<?php

    namespace App\Service\Empleado;

    use App\Entity\Empleado;
    use App\Repository\EmpleadoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class EmpleadoDeleteService{
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
        public function delete(int $id): Empleado{
            $Empleado = $this->repository->findById($id);
            $data = [
                'Clave' => $Empleado->getClave(),
                'Persona' => $Empleado->getPersona(),
                'Area' => $Empleado->getArea(),
                'Sucursal' => $Empleado->getSucursal()
            ];

            $this->repository->removeEntity($Empleado);

            $this->accesoService->create('Empleado', $id, 3, $data);

            return $Empleado;
        }
    }