<?php

    namespace App\Service\ClientePersona;

    use App\Entity\ClientePersona;
    use App\Repository\ClientePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClientePersonaRegisterService{
        private ClientePersonaRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(ClientePersonaRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(int $Cliente, int $Persona, int $Relacion, ?string $Titulo, ?string $Telefono, ?string $Telefono2, ?string $CorreoElectronico): ClientePersona{
            $ClientePersona = new ClientePersona($Cliente, $Persona, $Relacion, $Titulo, $Telefono, $Telefono2, $CorreoElectronico);

            $this->repository->save($ClientePersona);

            $data = [
                'Cliente' => $ClientePersona->getCliente(),
                'Persona' => $ClientePersona->getPersona(),
                'Relacion' => $ClientePersona->getRelacion(),
                'Titulo' => $ClientePersona->getTitulo(),
                'Telefono' => $ClientePersona->getTelefono(),
                'Telefono2' => $ClientePersona->getTelefono2(),
                'CorreoElectronico' => $ClientePersona->getCorreoElectronico()
            ];
            $this->accesoService->create('ClientePersona', $ClientePersona->getId(), 2, $data);

            return $ClientePersona;
        }
    }