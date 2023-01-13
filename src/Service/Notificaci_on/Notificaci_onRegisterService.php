<?php

    namespace App\Service\Notificaci_on;

    use App\Entity\Notificaci_on;
    use App\Repository\Notificaci_onRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class Notificaci_onRegisterService{
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
        public function create(int $Usuario, ?int $Notificado, int $Mensaje): Notificaci_on{
            $Notificaci_on = new Notificaci_on($Usuario, $Notificado, $Mensaje);

            $this->repository->save($Notificaci_on);

            $data = [
                'Usuario' => $Notificaci_on->getUsuario(),
                'Notificado' => $Notificaci_on->getNotificado(),
                'Mensaje' => $Notificaci_on->getMensaje()
            ];
            $this->accesoService->create('Notificaci_on', $Notificaci_on->getId(), 2, $data);

            return $Notificaci_on;
        }
    }