<?php

    namespace App\Service\Mensaje;

    use App\Entity\Mensaje;
    use App\Repository\MensajeRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MensajeRegisterService{
        private MensajeRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(MensajeRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(string $Mensaje): Mensaje{
            $Mensaje = new Mensaje($Mensaje);

            $this->repository->save($Mensaje);

            $data = [
                'Mensaje' => $Mensaje->getMensaje()
            ];
            $this->accesoService->create('Mensaje', $Mensaje->getId(), 2, $data);

            return $Mensaje;
        }
    }