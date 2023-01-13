<?php

    namespace App\Service\Mensaje;

    use App\Entity\Mensaje;
    use App\Repository\MensajeRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MensajeUpdateService{
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
        public function update(int $id, string $Mensaje): Mensaje{
            $Mensaje = $this->repository->findById($id);
            $Mensaje->setMensaje($Mensaje);
            $this->repository->save($Mensaje);

            $data = [
                'Mensaje' => $Mensaje->getMensaje()
            ];
            $this->accesoService->create('Mensaje', $id, 5, $data);

            return $Mensaje;
        }
    }