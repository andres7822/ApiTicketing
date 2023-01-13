<?php

    namespace App\Service\Notificaci_on;

    use App\Entity\Notificaci_on;
    use App\Repository\Notificaci_onRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Notificaci_onUpdateService{
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
        public function update(int $id, int $Usuario, ?int $Notificado, int $Mensaje): Notificaci_on{
            $Notificaci_on = $this->repository->findById($id);
            $Notificaci_on->setUsuario($Usuario);
            $Notificaci_on->setNotificado($Notificado);
            $Notificaci_on->setMensaje($Mensaje);
            $this->repository->save($Notificaci_on);

            $data = [
                'Usuario' => $Notificaci_on->getUsuario(),
                'Notificado' => $Notificaci_on->getNotificado(),
                'Mensaje' => $Notificaci_on->getMensaje()
            ];
            $this->accesoService->create('Notificaci_on', $id, 5, $data);

            return $Notificaci_on;
        }
    }