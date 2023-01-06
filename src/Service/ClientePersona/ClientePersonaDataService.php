<?php

    namespace App\Service\ClientePersona;

    use App\Entity\ClientePersona;
    use App\Repository\ClientePersonaRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class ClientePersonaDataService{
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
        public function data(int $id): ClientePersona{
            $ClientePersona = $this->repository->findById($id);
            $data = [
                'Cliente' => $ClientePersona->getCliente(),
                'Persona' => $ClientePersona->getPersona(),
                'Relacion' => $ClientePersona->getRelacion(),
                'Titulo' => $ClientePersona->getTitulo(),
                'Telefono' => $ClientePersona->getTelefono(),
                'Telefono2' => $ClientePersona->getTelefono2(),
                'CorreoElectronico' => $ClientePersona->getCorreoElectronico()
            ];

            $this->accesoService->create('ClientePersona', $id, 4, $data);

            return $ClientePersona;
        }
    }