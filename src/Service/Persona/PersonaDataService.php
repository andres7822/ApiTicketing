<?php

    namespace App\Service\Persona;

    use App\Entity\Persona;
    use App\Repository\PersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class PersonaDataService{
        private PersonaRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(PersonaRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function data(int $id): Persona{
            $Persona = $this->repository->findById($id);
            $data = [
                'NombreORazonSocial' => $Persona->getNombreORazonSocial(),
                'Telefono' => $Persona->getTelefono(),
                'CorreoElectronico' => $Persona->getCorreoElectronico(),
                'TipoDePersona' => $Persona->getTipoDePersona(),
                'DatosFiscales' => $Persona->getDatosFiscales()
            ];

            $this->accesoService->create('Persona', $id, 4, $data);

            return $Persona;
        }
    }