<?php

    namespace App\Service\Mensaje;

    use App\Entity\Mensaje;
    use App\Repository\MensajeRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MensajeDataService{
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
        public function data(int $id): Mensaje{
            $Mensaje = $this->repository->findById($id);
            $data = [
                'Mensaje' => $Mensaje->getMensaje()
            ];

            $this->accesoService->create('Mensaje', $id, 4, $data);

            return $Mensaje;
        }
    }