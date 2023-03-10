<?php

    namespace App\Service\Empleado;

    use App\Entity\Empleado;
    use App\Repository\EmpleadoRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class EmpleadoUpdateService{
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
        public function update(int $id, string $Clave, int $Persona, ?int $Area, ?int $Sucursal): Empleado{
            $Empleado = $this->repository->findById($id);
            $Empleado->setClave($Clave);
            $Empleado->setPersona($Persona);
            $Empleado->setArea($Area);
            $Empleado->setSucursal($Sucursal);
            $this->repository->save($Empleado);

            $data = [
                'Clave' => $Empleado->getClave(),
                'Persona' => $Empleado->getPersona(),
                'Area' => $Empleado->getArea(),
                'Sucursal' => $Empleado->getSucursal()
            ];
            $this->accesoService->create('Empleado', $id, 5, $data);

            return $Empleado;
        }
    }