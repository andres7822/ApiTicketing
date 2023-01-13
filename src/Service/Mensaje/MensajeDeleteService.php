<?php

    namespace App\Service\Mensaje;

    use App\Entity\Mensaje;
    use App\Repository\MensajeRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class MensajeDeleteService{
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
        public function delete(int $id): Mensaje{
            $Mensaje = $this->repository->findById($id);
            $data = [
                'Mensaje' => $Mensaje->getMensaje()
            ];

            $this->repository->removeEntity($Mensaje);

            $this->accesoService->create('Mensaje', $id, 3, $data);

            return $Mensaje;
        }
    }