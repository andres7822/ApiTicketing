<?php

    namespace App\Service\Persona;

    use App\Entity\Persona;
    use App\Repository\PersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class PersonaUpdateService{
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
        public function update(int $id, string $NombreORazonSocial, string $Telefono, string $CorreoElectronico, int $TipoDePersona, ?int $DatosFiscales): Persona{
            $Persona = $this->repository->findById($id);
            $Persona->setNombreORazonSocial($NombreORazonSocial);
            $Persona->setTelefono($Telefono);
            $Persona->setCorreoElectronico($CorreoElectronico);
            $Persona->setTipoDePersona($TipoDePersona);
            $Persona->setDatosFiscales($DatosFiscales);
            $this->repository->save($Persona);

            $data = [
                'NombreORazonSocial' => $Persona->getNombreORazonSocial(),
                'Telefono' => $Persona->getTelefono(),
                'CorreoElectronico' => $Persona->getCorreoElectronico(),
                'TipoDePersona' => $Persona->getTipoDePersona(),
                'DatosFiscales' => $Persona->getDatosFiscales()
            ];
            $this->accesoService->create('Persona', $id, 5, $data);

            return $Persona;
        }
    }