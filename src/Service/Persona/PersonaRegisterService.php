<?php

    namespace App\Service\Persona;

    use App\Entity\Persona;
    use App\Repository\PersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class PersonaRegisterService{
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
        public function create(string $NombreORazonSocial, string $Telefono, string $CorreoElectronico, int $TipoDePersona, ?int $DatosFiscales): Persona{
            $Persona = new Persona($NombreORazonSocial, $Telefono, $CorreoElectronico, $TipoDePersona, $DatosFiscales);

            $this->repository->save($Persona);

            $data = [
                'NombreORazonSocial' => $Persona->getNombreORazonSocial(),
                'Telefono' => $Persona->getTelefono(),
                'CorreoElectronico' => $Persona->getCorreoElectronico(),
                'TipoDePersona' => $Persona->getTipoDePersona(),
                'DatosFiscales' => $Persona->getDatosFiscales()
            ];
            $this->accesoService->create('Persona', $Persona->getId(), 2, $data);

            return $Persona;
        }
    }