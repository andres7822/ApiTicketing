<?php

    namespace App\Service\Notificaci_on;

    use App\Entity\Notificaci_on;
    use App\Repository\Notificaci_onRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Notificaci_onDeleteService{
        private Notificaci_onRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(Notificaci_onRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function delete(int $id): Notificaci_on{
            $Notificaci_on = $this->repository->findById($id);
            $data = [
                'Usuario' => $Notificaci_on->getUsuario(),
                'Notificado' => $Notificaci_on->getNotificado(),
                'Mensaje' => $Notificaci_on->getMensaje()
            ];

            $this->repository->removeEntity($Notificaci_on);

            $this->accesoService->create('Notificaci_on', $id, 3, $data);

            return $Notificaci_on;
        }
    }