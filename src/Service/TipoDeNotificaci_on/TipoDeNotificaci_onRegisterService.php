<?php

    namespace App\Service\TipoDeNotificaci_on;

    use App\Entity\TipoDeNotificaci_on;
    use App\Repository\TipoDeNotificaci_onRepository;
    use App\Service\systemLog\systemLogRegisterService;
    use Doctrine\ORM\OptimisticLockException;
    use Doctrine\ORM\ORMException;

    class TipoDeNotificaci_onRegisterService{
        private TipoDeNotificaci_onRepository $repository;
        private systemLogRegisterService $accesoService;

        public function __construct(TipoDeNotificaci_onRepository $repository,
                                    systemLogRegisterService $accesoService){
            $this->repository = $repository;
            $this->accesoService = $accesoService;
        }

        /**
         * @throws OptimisticLockException
         * @throws ORMException
         */
        public function create(string $Nombre): TipoDeNotificaci_on{
            $TipoDeNotificaci_on = new TipoDeNotificaci_on($Nombre);

            $this->repository->save($TipoDeNotificaci_on);

            $data = [
                'Nombre' => $TipoDeNotificaci_on->getNombre()
            ];
            $this->accesoService->create('TipoDeNotificaci_on', $TipoDeNotificaci_on->getId(), 2, $data);

            return $TipoDeNotificaci_on;
        }
    }